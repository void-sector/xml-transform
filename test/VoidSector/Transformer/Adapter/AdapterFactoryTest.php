<?php

//namespace test\VoidSector\Transformer\Adapter;
//
//use InvalidArgumentException;
//use PHPUnit_Framework_TestCase;
//use VoidSector\Transformer\Adapter\AdapterFactory;
//
//
//class AdapterFactoryTest extends PHPUnit_Framework_TestCase
//{
//    public function testGetDefaultTransformAdapter()
//    {
//        $this->assertInstanceOf(
//            'VoidSector\Transformer\Adapter\SimpleXmlElement',
//            AdapterFactory::getAdapter('SimpleXmlElement')
//        );
//    }
//
//    
//    public function testGetDomDocumentTransformAdapter()
//    {
//        $this->assertInstanceOf(
//            'VoidSector\Transformer\Adapter\DOMDocument',
//            AdapterFactory::getAdapter('DOMDocument')
//        );
//    }
//
//    /**
//     * @expectedException InvalidArgumentException
//     */
//    public function testNoneExistingTransformAdapter()
//    {
//        AdapterFactory::getAdapter('fooBar');
//    }
//}
