<?php

namespace Fruitware\YandexGeocoderBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class FruitwareYandexGeocoderExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->setParameter($this->getAlias().'.key', $config['key']);
        $container->setParameter($this->getAlias().'.version', $config['version']);
        $container->setParameter($this->getAlias().'.lang', $config['lang']);
        $container->setParameter($this->getAlias().'.kind', $config['kind']);
    }
}