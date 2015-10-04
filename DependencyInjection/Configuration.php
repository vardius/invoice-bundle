<?php

namespace Vardius\Bundle\InvoiceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('vardius_invoice');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->children()
                ->scalarNode('invoice')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('entry')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('client')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('tax')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('seller')
                    ->defaultValue('')
                ->end()
                ->scalarNode('buyer')
                    ->defaultValue('')
                ->end()
            ->end();

        return $treeBuilder;
    }
}

