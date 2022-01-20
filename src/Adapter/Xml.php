<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Incubator\Config\Adapter;

use LibXMLError;
use Phalcon\Config\Config;
use Phalcon\Config\Config\Exception;

/**
 * Phalcon Config XML Adapter
 *
 * Reads xml files and converts them to Phalcon\Config objects.
 *
 * Given the next configuration file:
 *
 * <code>
 * <?xml version="1.0"?>
 * <root>
 *   <phalcon>
 *     <baseuri>/phalcon/</baseuri>
 *   </phalcon>
 *   <models>
 *     <metadata>memory</metadata>
 *   </models>
 *   <nested>
 *     <config>
 *       <parameter>here</parameter>
 *     </config>
 *   </nested>
 * </root>
 * </code>
 *
 * You can read it as follows:
 *
 * <code>
 * use Phalcon\Config\Adapter\Xml;
 * $config = new Xml("path/config.xml");
 * echo $config->phalcon->baseuri;
 * echo $config->nested->config->parameter;
 * </code>
 */
class Xml extends Config
{
    /**
     * Constructor
     *
     * @param string $filePath
     * @throws Exception
     */
    public function __construct(string $filePath)
    {
        if (!extension_loaded('SimpleXML')) {
            throw new Exception('SimpleXML extension not loaded');
        }

        libxml_use_internal_errors(true);
        $data = simplexml_load_file($filePath, 'SimpleXMLElement', LIBXML_NOCDATA);

        foreach (libxml_get_errors() as $error) {
            /** @var LibXMLError $error */
            switch ($error->code) {
                case LIBXML_ERR_WARNING:
                    trigger_error($error->message, E_USER_WARNING);
                    break;

                default:
                    throw new Exception($error->message);
            }
        }

        libxml_use_internal_errors(false);

        parent::__construct(
            json_decode(
                json_encode(
                    (array)$data
                ),
                true
            )
        );
    }
}
