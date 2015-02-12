<?php

namespace Transformer\Adapter;

use SimpleXMLElement as Handler;

class SimpleXmlElement implements AdapterInterface
{
    
    /**
     * @param string $xml (xml formatted string)
     * @return \SimpleXmlElement
     */    
    public function loadFromString($xml)
    {
        return new Handler($xml);
    }
    
    /**
     * @param string $xml (path to xml or xsl file)
     * @return \SimpleXmlElement
     */    
    public function loadFromFileOrUrl($xml)
    {
        return new Handler($xml, 0, true);
    }
}
