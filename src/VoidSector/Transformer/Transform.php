<?php

namespace VoidSector\Transformer;

use VoidSector\Transformer\Adapter\AdapterFactory;
use XSLTProcessor;

class Transform
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
        
        $this->processor()->importStyleSheet(
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
        return $this->processor()->transformToXml(
            $this->xmlDocument
        );
    }
    
    /**
     * Transform to DOMDocument
     * @return \DOMDocument
     */
    public function toDOMDocument()
    {
        return $this->processor()->transformToDoc(
            $this->xmlDocument
        );
    }

    
    /**
     * Get XSLTProcessor processor
     * @return XSLTProcessor
     */
    private function processor()
    {
        if (null === $this->processor) {
            $this->processor = new XSLTProcessor;
        }
        
        return $this->processor;
    }       
}