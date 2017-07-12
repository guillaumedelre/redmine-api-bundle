<?php

namespace Gdelre\RedmineApiBundle\DependencyInjection\Compiler;

use Gdelre\RedmineApiBundle\Interfaces\EntrypointInterface;
use Gdelre\RedmineApiBundle\Service\Entrypoint;
use GuzzleHttp\Client;
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

        if (empty($config['base_uri'])) {
            throw new \Exception('The base_uri parameter must be configured.');
        }

        if (empty($config['credential']['username'])
            && empty($config['credential']['password'])
            && empty($config['credential']['api_key'])
        ) {
            throw new \Exception('The credential parameter must be configured.');
        } else {
            $clientSettings[RequestOptions::AUTH] = [
                $config['credential']['username'],
                $config['credential']['password'],
            ];
        }

        foreach (EntrypointInterface::ENTRYPOINTS as $definition) {
            $clientSettings['base_uri'] = $config['base_uri'] . $definition['path'];

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
}