<?php

declare(strict_types=1);

namespace Phalcon\Incubator\Config\Tests\Unit\Adapter;

use Codeception\Test\Unit;
use Phalcon\Config;
use Phalcon\Incubator\Config\Adapter\Xml;

final class XmlTest extends Unit
{
    public function testImplementation(): void
    {
        $class = $this->createMock(Xml::class);

        $this->assertInstanceOf(Config::class, $class);
    }
}
