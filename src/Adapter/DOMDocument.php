<?php

namespace Transformer\Adapter;

class DOMDocument implements AdapterInterface
{
 
    /**
     * @param string $xml (xml formatted string)
     * @return \DOMDocuement
     */
    public function loadFromString($xml)
    {
        $domDocument = new \DOMDocument();
        $domDocument->loadXML($xml, LIBXML_NOXMLDECL);
        return $domDocument;
    }
    
    /**
     * @param string $xml (path to xml or xsl file)
     * @return \DOMDocument
     */
    public function loadFromFileOrUrl($xml)
    {
        $domDocument = new \DOMDocument();
        $domDocument->load($xml, LIBXML_NOXMLDECL);
        return $domDocument;
    }

    
    /**
     * @return \DomDocument
     */
    private function getHandler()
    {
        return new \DOMDocument();
    }
}
