<?php

namespace test\Transformer;

use PHPUnit_Framework_TestCase;
use Transformer\Transformer;

class TransformerTest extends PHPUnit_Framework_TestCase
{
    /**
     *  path to where to find the xml/xsl test files
     */
    private $xmlDataProviderDir;
    
    
    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->xmlDataProviderDir = __DIR__ . '/xmlDataProvider/';
    }

    
    /**
     * Dynamic dataProvider
     * 
     * this reads the test/xmlDataProvider directory for tests to execute
     * it ignores the directory's which ends with the .ignore extention
     * 
     * @return array
     */
    public function xmlDataProvider()
    {
        $directoryIterator = new \DirectoryIterator($this->xmlDataProviderDir);
        
        $tests = array();
        
        foreach ($directoryIterator as $directory) {
            if (!$directoryIterator->isDot() && $directory->isDir() && 'ignore' !== $directory->getExtension()) {
                $tests[] = array($directory->getFilename(), 'DOMDocument', 'string');
                $tests[] = array($directory->getFilename(), 'SimpleXmlElement', 'string');
                $tests[] = array($directory->getFilename(), 'DOMDocument', 'object');
                $tests[] = array($directory->getFilename(), 'SimpleXmlElement', 'object');
            }
        }
        
        return array_reverse($tests);
    }
    
    
    /**
     * @dataProvider xmlDataProvider
     */    
    public function testXmlTransForms($testCase, $adapter, $returnType='string')
    {
        $xmlFile = $this->xmlDataProviderDir . $testCase . '/structure.xml';
        $expected = $this->xmlDataProviderDir . $testCase . '/structureExpected.xml';
        $xslFile = $this->xmlDataProviderDir . $testCase . '/transform.xsl';
        
        $transformer = new Transformer($adapter);
        $transformer->transform(
            file_get_contents($xmlFile),
            $xslFile
        );
        
        // it's very lame to to it like this, but assertEquals() and assertEqualXMLStructure() does not seem to do the job :(
        $resultXmlString = ('string' === $returnType) ? $transformer->toString() : $transformer->toDOMDocument()->saveXML();
        
        $this->assertXmlStringEqualsXmlFile(
            $expected,
            $resultXmlString
        );
    }
}
