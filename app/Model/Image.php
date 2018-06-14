<?php

namespace App\Model;

class Image
{
    public $url;
    public $external = 0;

    public function __construct($url, $external = 0)
    {
        $this->url = strval($url);
        $this->external = intval($external);
    }
}