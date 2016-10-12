<?php

namespace Fruitware\YandexGeocoderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fruitware_yandex_geocoder', 'array');
        $rootNode
            ->children()
                ->scalarNode('key')->defaultNull()->end()
                ->scalarNode('version')->cannotBeEmpty()->defaultValue('1.x')->end()
                ->enumNode('lang')
                    ->cannotBeEmpty()
                    ->defaultValue('ru-RU')
                    ->values(array('ru-RU', 'uk-UA', 'be-BY', 'en-US', 'en-BR', 'tr-TR'))
                ->end()
                ->enumNode('kind')
                    ->defaultNull()
                    ->values(array('house', 'street', 'metro', 'district', 'locality'))
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}