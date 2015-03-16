<?php

namespace Transformer;

use Transformer\Adapter\AdapterFactory;
use XSLTProcessor;

class Transformer
{
    
    const DEFAULT_ADAPTER = 'DOMDocument';
    
    
    /**
     * @var AdapterInterface [DOMDocument|SimpleXmlElement]
     */
    private $adapter;
    
    
    /**
     * @var \DOMDocument|\SimpleXmlElement
     */
    private $xmlDocument;
    
    
    /**
     * @var XSLTProcessor 
     */
    private $processor;
    
    
    /**
     * Constructor
     * 
     * @param string $adapter
     */
    public function __construct($adapter=null)
    {
         if (null === $adapter) {
             $adapter = self::DEFAULT_ADAPTER;
         }
         
         $this->adapter = AdapterFactory::getAdapter($adapter);
    }

    
    /**
     * 
     * @return type
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
    
    
    /**
     * Transform the XML using the xsl
     * 
     * @param string|DOMDocument|SimpleXmlElement $xmlDocument
     * @param string $styleSheet
     * @return Transform
     * 
     * @todo refactor (this method does not represent what it does, maybe rename it to initialize?!?!?!)
     */
    public function transform($xmlDocument, $styleSheet)
    {
        if (!$xmlDocument instanceof \DomDocument && !$xmlDocument instanceof \SimpleXMLElement) {
            $xmlDocument = $this->getAdapter()->loadFromString($xmlDocument);
        }
        
        $this->xmlDocument = $xmlDocument;
        
        $this->getXSLProcessor()->importStyleSheet(
            $this->getAdapter()->loadFromFileOrUrl($styleSheet)
        );
        
        return $this;
    }
 
    
    /**
     * Transform to XmlString
     * @return string
     */
    public function toString()
    {
        return $this->getXSLProcessor()->transformToXml(
            $this->xmlDocument
        );
    }
    
    
    /**
     * Transform to DOMDocument
     * @return \DOMDocument
     */
    public function toDOMDocument()
    {
        return $this->getXSLProcessor()->transformToDoc(
            $this->xmlDocument
        );
    }

    
    /**
     * Get XSLTProcessor processor
     * @return XSLTProcessor
     */
    private function getXSLProcessor()
    {
        if (null === $this->processor) {
            $this->processor = new XSLTProcessor;
        }
        
        return $this->processor;
    }       
}