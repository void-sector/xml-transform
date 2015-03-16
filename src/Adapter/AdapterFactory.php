<?php

namespace Transformer\Adapter;

use InvalidArgumentException;
use Transformer\Adapter\DOMDocumentHandler;
use Transformer\Adapter\SimpleXmlElementHandler;

class AdapterFactory
{
    /**
     * Get Adapter
     * 
     * @param string $adapter
     * @return AdapterInterface [SimpleXmlElement|DOMDocument]
     * @throws InvalidArgumentException
     */
    public static function getAdapter($adapter)
    {
        switch ($adapter) {
            case 'DOMDocument' :
                return new DOMDocumentHandler;
                
            case 'SimpleXmlElement' :
                return new SimpleXmlElementHandler;
            
            default: 
                throw new InvalidArgumentException('unsupported $adapter sepecified');
            
        }
    }
}
