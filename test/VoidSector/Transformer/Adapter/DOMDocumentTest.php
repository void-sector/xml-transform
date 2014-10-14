<?php

namespace test\VoidSector\Transformer\Adapter;

use DOMDocument;
use PHPUnit_Framework_TestCase;

class DOMDocumentTest extends PHPUnit_Framework_TestCase
{
    public function testloadFromString()
    {
        $domDocument = new DOMDocument();
        $this->assertEquals(
            $domDocument->loadXML('<foo><bar /></foo>'),
            $this->getHandler()->loadFromString('<foo><bar /></foo>')
        );
    }
    
    
    public function testloadFromFileOrUrl()
    {
        $xmlFile = __DIR__ . '/../../../xmlDataProvider/1.book/structure.xml';
        $domDocument = new DOMDocument();
        $this->assertEquals(
            $domDocument->load($xmlFile),
            $this->getHandler()->loadFromFileOrUrl($xmlFile)
        );
    }

    
    /**
     * Helper Function
     * @return \SimXml\Transformer\Adapter\DOMDocument
     */
    private function getHandler()
    {
        return new \VoidSector\Transformer\Adapter\DOMDocument();
    }    
}
