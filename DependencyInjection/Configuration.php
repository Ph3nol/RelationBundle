<?php

namespace Sly\RelationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 *
 * @uses ConfigurationInterface
 * @author Cédric Dugat <ph3@slynett.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder
            ->root('sly_relation')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('relations')
                        ->useAttributeAsKey('id')
                        ->prototype('array')
                            ->children()
                                ->scalarNode('entity1')
                                    ->cannotBeEmpty()
                                ->end()
                                ->scalarNode('entity2')
                                    ->cannotBeEmpty()
                                ->end()
                                ->scalarNode('bidirectional')
                                    ->defaultFalse()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
