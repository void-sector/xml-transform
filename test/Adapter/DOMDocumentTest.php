<?php

namespace test\Transformer\Adapter;

use DOMDocument;
use PHPUnit_Framework_TestCase;

class DOMDocumentTest extends PHPUnit_Framework_TestCase
{
    public function testloadFromString()
    {
        $domDocument = new DOMDocument();
        $domDocument->loadXML('<foo><bar /></foo>');
        $this->assertEquals(
            $domDocument,
            $this->getHandler()->loadFromString('<foo><bar /></foo>')
        );
    }
    
    
    public function testloadFromFileOrUrl()
    {
        $xmlFile = __DIR__ . '/../xmlDataProvider/1.book/structure.xml';
        $domDocument = new DOMDocument();
        $domDocument->load($xmlFile);
        $this->assertEquals(
            $domDocument,
            $this->getHandler()->loadFromFileOrUrl($xmlFile)
        );
    }

    
    /**
     * Helper Function
     * @return \SimXml\Transformer\Adapter\DOMDocument
     */
    private function getHandler()
    {
        return new \Transformer\Adapter\DOMDocument();
    }    
}
