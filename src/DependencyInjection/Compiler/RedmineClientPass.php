<?php

namespace Gdelre\RedmineApiBundle\DependencyInjection\Compiler;

use Gdelre\RedmineApiBundle\Interfaces\EntrypointInterface;
use Gdelre\RedmineApiBundle\Service\Entrypoint;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\UriNormalizer;
use GuzzleHttp\RequestOptions;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class RedmineClientPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {

        $config = current($container->getExtensionConfig('gdelre_redmine_api'));

        $clientSettings = [];
        $clientSettings['timeout'] = $config['timeout'];
        $clientSettings[RequestOptions::VERIFY] = false;

        if (empty($config['base_uri'])) {
            throw new \Exception('The base_uri parameter must be configured.');
        }
        $baseUri = self::getUri($config['base_uri']);

        $hasUsername = !empty($config['credential']['username']);
        $hasPassword = !empty($config['credential']['password']);
        $hasApiKey = !empty($config['credential']['api_key']);

        if ($hasApiKey && $hasPassword) {
            $baseUri = self::getUri(
                $baseUri->withUserInfo(
                    $config['credential']['api_key'],
                    rand(100000, 199999)
                )->__toString()
            );
        } elseif ($hasUsername && $hasPassword) {
            $baseUri = self::getUri(
                $baseUri->withUserInfo(
                    $config['credential']['username'],
                    $config['credential']['password']
                )->__toString()
            );
        } else {
            throw new \Exception('The credential parameter must be configured.');
        }

        $clientSettings[RequestOptions::AUTH] = explode(':', $baseUri->getUserInfo());

        foreach (EntrypointInterface::ENTRYPOINTS as $definition) {
            $baseUri = self::getUri($baseUri->withPath($definition['path'])->__toString());
            $clientSettings['base_uri'] = $baseUri->withUserInfo('')->__toString();

            // Create Guzzle Client With the right BaseUri
            $container->setDefinition(
                "gdelre_redmine_api.client." . $definition['name'],
                (new Definition(Client::class, [$clientSettings]))
                    ->setPublic(false)
                    ->addTag('csa_guzzle.client')
            );

            // Create Redmine Entrypoint that handle deserialization
            $container->setDefinition(
                "gdelre_redmine_api.entrypoint." . $definition['name'],
                (new Definition(
                    Entrypoint::class,
                    [
                        new Reference('logger'),
                        new Reference("serializer"),
                        new Reference("gdelre_redmine_api.client." . $definition['name']),
                        $definition,
                    ]
                ))
                    ->addTag('gdelre_redmine_api.entrypoint')
            );
        }
    }

    /**
     * @param string $url
     *
     * @return \Psr\Http\Message\UriInterface
     */
    private static function getUri(string $url)
    {
        return UriNormalizer::normalize(new Uri($url), UriNormalizer::PRESERVING_NORMALIZATIONS | UriNormalizer::REMOVE_DUPLICATE_SLASHES);
    }

}
