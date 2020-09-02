<?php

declare(strict_types=1);

namespace Phalcon\Incubator\Config\Tests\Functional\Adapter;

use Phalcon\Incubator\Config\Adapter\Xml;

final class XmlCest
{
    public function expectArray(\FunctionalTester $I): void
    {
        $I->wantToTest('Transform Config to the array does not returns the expected result');

        $expected = [
            'phalcon' => [
                'baseuri' => '/phalcon/'
            ],
            'models' => [
                'metadata' => 'memory',
            ],
            'nested' => [
                'config' => [
                    'parameter' => 'here',
                ],
            ],
        ];

        $config = new Xml(\codecept_data_dir('config.xml'));

        $I->assertSame($expected, $config->toArray());
    }
}
