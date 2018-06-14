<?php

namespace App\Model;


class Product
{
    protected $name;
    protected $price;
    protected $market_price;
    protected $images = [];

    protected $custom_attribute;

    public function __construct($name)
    {
        $this->name = strval($name);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = floatval($price);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setMarketPrice($market_price)
    {
        $this->market_price = floatval($market_price);
    }

    public function getMarketPrice()
    {
        return $this->market_price;
    }

    public function setCustomAttribute($obj_attribute)
    {
        $this->custom_attribute = $obj_attribute;
    }

    public function addImage($image, $is_default = 0) {
        if (intval($is_default)) {
            array_unshift($this->images, $image);
        } else {
            array_push($this->images, $image);
        }
    }

    public function removeImage($index) {
        unset($this->images[$index]);
    }

    public function getImageList() {
        return $this->images;
    }

    public function getCustomAttribute() {
        return $this->custom_attribute;
    }
}