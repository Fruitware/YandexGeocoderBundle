<?php

namespace Fruitware\YandexGeocoderBundle\Tests;

use Fruitware\YandexGeocoderBundle\FruitwareYandexGeocoderBundle;

class FruitwareYandexGeocoderBundleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FruitwareYandexGeocoderBundle
     */
    private $bundle;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->bundle = new FruitwareYandexGeocoderBundle();
    }

    public function testBundle()
    {
        $this->assertInstanceOf('Symfony\Component\HttpKernel\Bundle\Bundle', $this->bundle);
    }
}