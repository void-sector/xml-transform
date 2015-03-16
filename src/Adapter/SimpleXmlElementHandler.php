<?php

namespace Transformer\Adapter;

use \SimpleXMLElement as XmlHandler;

class SimpleXmlElementHandler implements AdapterInterface
{
    
    /**
     * @param string $xml (xml formatted string)
     * @return \SimpleXmlElement
     */    
    public function loadFromString($xml)
    {
        return new XmlHandler($xml);
    }
    
    /**
     * @param string $xml (path to xml or xsl file)
     * @return \SimpleXmlElement
     */    
    public function loadFromFileOrUrl($xml)
    {
        return new XmlHandler($xml, 0, true);
    }
}
