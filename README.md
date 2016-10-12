FruitwareYandexGeocoderBundle
==================

[![Build Status](https://travis-ci.org/Fruitware/YandexGeocoderBundle.svg?branch=master)](https://travis-ci.org/Fruitware/YandexGeocoderBundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Fruitware/YandexGeocoderBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Fruitware/YandexGeocoderBundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Fruitware/YandexGeocoderBundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Fruitware/YandexGeocoderBundle/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/57fe850791ec900021492df4/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/57fe850791ec900021492df4)

[![Latest Stable Version](https://poser.pugx.org/fruitware/yandex-geocoder-bundle/v/stable.png)](https://packagist.org/packages/fruitware/yandex-geocoder-bundle)
[![Latest Unstable Version](https://poser.pugx.org/fruitware/yandex-geocoder-bundle/v/unstable.svg)](https://packagist.org/packages/fruitware/yandex-geocoder-bundle)
[![Total Downloads](https://poser.pugx.org/fruitware/yandex-geocoder-bundle/downloads.png)](https://packagist.org/packages/fruitware/yandex-geocoder-bundle)
[![License](https://poser.pugx.org/fruitware/yandex-geocoder-bundle/license.svg)](https://packagist.org/packages/fruitware/yandex-geocoder-bundle)

Symfony2 bundle for interactions with geo-coding Yandex.Maps

## License

This bundle is available under the [MIT license](Resources/meta/LICENSE).

## Prerequisites

This version of the bundle requires Symfony 2.3+.

## Installation

Installation is a quick 4 step process:

1. Download FruitwareYandexGeocoderBundle using composer
2. Enable the Bundle
3. Configure the FruitwareYandexGeocoderBundle
4. [Usage](https://github.com/yandex-php/php-yandex-geo)

### Step 1: Download the bundle

Require the library in your `composer.json` file:

``` bash
$ composer require fruitware/yandex-geocoder-bundle
```

### Step 2: Register the bundle

Then, add the bundle in your `AppKernel`:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = [
        // ...
        new Fruitware\YandexGeocoderBundle\FruitwareYandexGeocoderBundle(),
    ];
}
```

### Step 3: Configure the FruitwareYandexGeocoderBundle

The bundle comes with a sensible default configuration, which is listed below.

```yaml
# app/config/config.yml
fruitware_yandex_geocoder:
    key: ~
    version: 1.x # default
    lang: ru-RU # values:['ru-RU', 'uk-UA', 'be-BY', 'en-US', 'en-BR', 'tr-TR']
	kind: ~ # default, values: ['house', 'street', 'metro', 'district', 'locality']
```

## Contribution

Any question or feedback? Open an issue and I will try to reply quickly.

A feature is missing here? Feel free to create a pull request to solve it!

I hope this has been useful and has helped you. If so, share it and recommend
it! :)
