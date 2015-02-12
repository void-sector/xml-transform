<?php

namespace Transformer\Adapter;

use InvalidArgumentException;
use Transformer\Adapter\DOMDocument;
use Transformer\Adapter\SimpleXmlElement;

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
                return new DOMDocument;
                
            case 'SimpleXmlElement' :
                return new SimpleXmlElement;
            
            default: 
                throw new InvalidArgumentException('unsupported $adapter sepecified');
            
        }
    }
}
