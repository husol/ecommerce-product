<?php

namespace App\Model;

//Developer can update custom attributes without modifying the core database
class CustomAttribute
{
    public $color;
    public $storage;
    public $description;
    public $origin;
    public $factory_date;
    public $weight;

    public function __construct($attributes)
    {
        foreach($attributes as $k => $val) {
            $this->$k = $val;
        }
    }
}