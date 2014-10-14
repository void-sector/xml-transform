<?php

namespace VoidSector\Transformer\Adapter;

use DOMDocument as Handler;

class DOMDocument implements AdapterInterface
{
 
    /**
     * @param string $xml (xml formatted string)
     * @return \DOMDocuement
     */
    public function loadFromString($xml)
    {
        return Handler::loadXML($xml, LIBXML_NOXMLDECL);
    }
    
    /**
     * @param string $xml (path to xml or xsl file)
     * @return \DOMDocument
     */
    public function loadFromFileOrUrl($xml)
    {
        return Handler::load($xml, LIBXML_NOXMLDECL);
    }
}
