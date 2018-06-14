<?php

namespace App\Model;

class ConfigurableProduct
{
    protected $product_list = [];

    public function getList()
    {
        return $this->product_list;
    }

    public function add($product)
    {
        $hash = md5(serialize($product));
        if (array_key_exists($hash, $this->product_list)) {
            //Duplicated. Do not add;
            return false;
        }
        $this->product_list[$hash] = $product;
        return true;
    }

    public function remove($product)
    {
        $hash = md5(serialize($product));
        unset($this->product_list[$hash]);
    }
}