<?php

namespace Graybit\Bundle\MarkitUpBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Konstantin Kuklin <konstantin.kuklin@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('graybit_markit_up', 'array');
        $rootNode
            ->children()
                ->scalarNode('textareaClass')->cannotBeEmpty()->defaultValue('bbcode')->end()
                ->scalarNode('bbcodeSettingFile')->cannotBeEmpty()->end()
                ->scalarNode('bbcodeClass')->cannotBeEmpty()->defaultValue('defaultSets')->end()
                ->scalarNode('skinCss')->cannotBeEmpty()->defaultValue('markitup')->end()
                ->scalarNode('setsCss')->cannotBeEmpty()->defaultValue('bbcode')->end()
            ->end();

        return $treeBuilder;
    }
}
