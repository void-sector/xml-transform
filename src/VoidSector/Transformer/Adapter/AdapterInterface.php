<?php

namespace VoidSector\Transformer\Adapter;

interface AdapterInterface
{
    
    public function loadFromString($xml);

    public function loadFromFileOrUrl($xml);
}
