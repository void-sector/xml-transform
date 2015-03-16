<?php

namespace test\Transformer\Adapter;

use PHPUnit_Framework_TestCase;

class SimpleXmlElementtTest extends PHPUnit_Framework_TestCase
{
    public function testloadFromString()
    {
        $this->assertEquals(
            new \SimpleXmlElement('<foo><bar /></foo>'),
            $this->getHandler()->loadFromString('<foo><bar /></foo>')
        );
    }
    
    
    public function testloadFromFileOrUrl()
    {
        $xmlFile = __DIR__ . '/../xmlDataProvider/1.book/structure.xml';
        
        $this->assertEquals(
            new \SimpleXmlElement($xmlFile, 0, true),
            $this->getHandler()->loadFromFileOrUrl($xmlFile)
        );
    }

    
    /**
     * Helper Function
     * @return \Transformer\Adapter\SimpleXmlElement
     */
    private function getHandler()
    {
        return new \Transformer\Adapter\SimpleXmlElementHandler();
    }    
}
