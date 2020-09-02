# Phalcon\Incubator\Config

[![Discord](https://img.shields.io/discord/310910488152375297?label=Discord)](http://phalcon.link/discord)
[![Packagist Version](https://img.shields.io/packagist/v/phalcon/incubator-config)](https://packagist.org/packages/incubator-config)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/phalcon/incubator-config)](https://packagist.org/packages/phalcon/incubator-config)
[![codecov](https://codecov.io/gh/phalcon/incubator-config/branch/master/graph/badge.svg)](https://codecov.io/gh/phalcon/incubator-config)
[![Packagist](https://img.shields.io/packagist/dd/phalcon/incubator-config)](https://packagist.org/packages/phalcon/incubator-config/stats)

## XML Adapter

Reads xml files and converts them to Phalcon\Config objects.

Given the next configuration file:

```xml
<root>
  <phalcon>
    <baseuri>/phalcon/</baseuri>
  </phalcon>
  <models>
    <metadata>memory</metadata>
  </models>
  <nested>
    <config>
      <parameter>here</parameter>
    </config>
  </nested>
</root>
```

You can read it as follows:

```php
use Phalcon\Incubator\Config\Adapter\Xml;

$config = new Xml('path/config.xml');

echo $config->phalcon->baseuri;
echo $config->nested->config->parameter;
```
