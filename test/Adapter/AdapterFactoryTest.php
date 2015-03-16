<?php

namespace test\VoidSector\Transformer\Adapter;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;
use Transformer\Adapter\AdapterFactory;


class AdapterFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testGetDefaultTransformAdapter()
    {
        $this->assertInstanceOf(
            'Transformer\Adapter\SimpleXmlElementHandler',
            AdapterFactory::getAdapter('SimpleXmlElement')
        );
    }

    
    public function testGetDomDocumentTransformAdapter()
    {
        $this->assertInstanceOf(
            'Transformer\Adapter\DOMDocumentHandler',
            AdapterFactory::getAdapter('DOMDocument')
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNoneExistingTransformAdapter()
    {
        AdapterFactory::getAdapter('fooBar');
    }
}
