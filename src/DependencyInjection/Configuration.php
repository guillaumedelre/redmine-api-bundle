<?php

namespace Gdelre\RedmineApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('gdelre_redmine_api');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $this->addRedmineApiSection($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node The root node.
     */
    protected function addRedmineApiSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->scalarNode('base_uri')->defaultValue('')->end()
                ->scalarNode('timeout')->defaultValue('2.0')->end()
                ->booleanNode('verify')->defaultFalse()->end()
                ->arrayNode('credential')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('username')->defaultValue('')->end()
                        ->scalarNode('password')->defaultValue('')->end()
                        ->scalarNode('api_key')->defaultValue('')->end()
                    ->end()
                ->end()
                ->arrayNode('credential')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('username')->defaultValue('')->end()
                        ->scalarNode('password')->defaultValue('')->end()
                        ->scalarNode('api_key')->defaultValue('')->end()
                    ->end()
                ->end()
            ->end();
    }
}
