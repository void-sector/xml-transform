<?php

namespace Transformer\Adapter;

use \DOMDocument as XmlHandler;

class DOMDocumentHandler implements AdapterInterface
{
 
    /**
     * @param string $xml (xml formatted string)
     * @return \DOMDocuement
     */
    public function loadFromString($xml)
    {
        $domDocument = new XmlHandler();
        $domDocument->loadXML($xml, LIBXML_NOXMLDECL);
        return $domDocument;
    }
    
    /**
     * @param string $xml (path to xml or xsl file)
     * @return DOMDocument
     */
    public function loadFromFileOrUrl($xml)
    {
        $domDocument = new XmlHandler();
        $domDocument->load($xml, LIBXML_NOXMLDECL);
        return $domDocument;
    }
}
