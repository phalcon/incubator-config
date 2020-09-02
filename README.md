# Phalcon\Incubator\Config

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
