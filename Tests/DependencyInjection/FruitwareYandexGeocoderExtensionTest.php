<?php

namespace Fruitware\YandexGeocoderBundle\Tests\DependencyInjection;

use Fruitware\YandexGeocoderBundle\DependencyInjection\FruitwareYandexGeocoderExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FruitwareYandexGeocoderExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContainerBuilder
     */
    private $container;
    /**
     * @var FruitwareYandexGeocoderExtension
     */
    private $extension;

    public function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new FruitwareYandexGeocoderExtension();
    }

    public function tearDown()
    {
        unset($this->container, $this->extension);
    }

    public function testDefaultParameters()
    {
        $this->extension->load(array(), $this->container);

        $this->assertTrue($this->container->hasParameter($this->extension->getAlias().'.key'));
        $this->assertNull($this->container->getParameter($this->extension->getAlias().'.key'));

        $this->assertTrue($this->container->hasParameter($this->extension->getAlias().'.version'));
        $this->assertEquals('1.x', $this->container->getParameter($this->extension->getAlias().'.version'));

        $this->assertTrue($this->container->hasParameter($this->extension->getAlias().'.lang'));
        $this->assertEquals('ru-RU', $this->container->getParameter($this->extension->getAlias().'.lang'));

        $this->assertTrue($this->container->hasParameter($this->extension->getAlias().'.kind'));
        $this->assertNull($this->container->getParameter($this->extension->getAlias().'.kind'));
    }

    public function testCustomLang()
    {
        $config = array(
            $this->extension->getAlias() => array('lang' => 'uk-UA'),
        );

        $this->extension->load($config, $this->container);

        $this->assertTrue($this->container->hasParameter($this->extension->getAlias().'.lang'));
        $this->assertEquals('uk-UA', $this->container->getParameter($this->extension->getAlias().'.lang'));
    }

    public function testUndefinedLangException()
    {
        $config = array(
            $this->extension->getAlias() => array('lang' => null),
        );

        $this->setExpectedException('Symfony\Component\Config\Definition\Exception\InvalidConfigurationException');
        $this->extension->load($config, $this->container);
    }

    public function testKey()
    {
        $config = array(
            $this->extension->getAlias() => array('key' => 'test'),
        );

        $this->extension->load($config, $this->container);

        $this->assertTrue($this->container->hasParameter($this->extension->getAlias().'.key'));
    }

    public function testDefaultClient()
    {
        $this->extension->load(array(), $this->container);

        $client = $this->extension->getAlias().'.service.client';
        $this->assertTrue($this->container->hasDefinition($client));

        $this->assertTrue($this->container->getDefinition($client)->hasMethodCall('setLang'));
        $this->assertParameter('1.x', $this->extension->getAlias().'.version');
        $this->assertParameter('ru-RU', $this->extension->getAlias().'.lang');
        $this->assertTrue($this->container->getDefinition($client)->hasMethodCall('setToken'));
        $this->assertTrue($this->container->getDefinition($client)->hasMethodCall('setKind'));
        $this->assertFalse($this->container->getDefinition($client)->hasMethodCall('load'));
    }

    public function testCustomClient()
    {
        $config = array(
            $this->extension->getAlias() => array(
                'key' => 'test_key',
                'lang' => 'uk-UA',
            ),
        );

        $this->extension->load($config, $this->container);

        $client = $this->extension->getAlias().'.service.client';
        $this->assertTrue($this->container->hasDefinition($client));

        $this->assertTrue($this->container->getDefinition($client)->hasMethodCall('setLang'));
        $this->assertParameter('1.x', $this->extension->getAlias().'.version');
        $this->assertParameter('uk-UA', $this->extension->getAlias().'.lang');
        $this->assertParameter('test_key', $this->extension->getAlias().'.key');
        $this->assertTrue($this->container->getDefinition($client)->hasMethodCall('setToken'));
        $this->assertTrue($this->container->getDefinition($client)->hasMethodCall('setKind'));
        $this->assertFalse($this->container->getDefinition($client)->hasMethodCall('load'));
    }

    /**
     * @param string $value
     * @param string $key
     */
    private function assertParameter($value, $key)
    {
        $this->assertEquals($value, $this->container->getParameter($key), sprintf('%s parameter is correct', $key));
    }
}