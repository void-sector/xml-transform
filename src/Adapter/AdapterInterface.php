<?php

namespace Transformer\Adapter;

interface AdapterInterface
{
    
    public function loadFromString($xml);

    public function loadFromFileOrUrl($xml);
}
