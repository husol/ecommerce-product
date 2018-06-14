<?php

namespace App;

include "Model/ConfigurableProduct.php";
include "Model/Product.php";
include "Model/Image.php";
include "Model/CustomAttribute.php";

use App\Model\ConfigurableProduct;
use App\Model\CustomAttribute;
use App\Model\Product;
use App\Model\Image;

class Test
{
    public function initProductA()
    {
        $productA = new Product("Iphone X 64Gb Black");
        $productA->setPrice(999);
        $productA->setMarketPrice(1099);

        $img1 = new Image("img/1.jpg");
        $productA->addImage($img1);
        $img2 = new Image("https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12231410/Labrador-Retriever-On-White-01.jpg", 1);
        $productA->addImage($img2);
        $img3 = new Image("img/2.jpg");
        $productA->addImage($img3, 1);

        $customAttribute = [
            'color' => "Black",
            'storage' => 64,
            'description' => "This is Iphone X 64Gb Black with price $999",
            'origin' => "USA",
            'factory_date' => "2018-01-23 15:00:30",
            'weight' => 3.5
        ];
        $productA->setCustomAttribute(new CustomAttribute($customAttribute));

        return $productA;
    }

    public function initProductB()
    {
        $product = new Product("Iphone X 128Gb Black");
        $product->setPrice(950);
        $product->setMarketPrice(1050);

        $img1 = new Image("https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12231410/Labrador-Retriever-On-White-01.jpg", 1);
        $product->addImage($img1);
        $img2 = new Image("img/2.jpg", 1);
        $product->addImage($img2);
        $img3 = new Image("img/3.jpg");
        $product->addImage($img3);

        $customAttribute = [
            'color' => "Yellow",
            'storage' => 128,
            'description' => "This is Iphone X 128Gb Black with price $950",
            'origin' => "USA",
            'factory_date' => "2018-05-25 15:00:30",
            'weight' => 3.7
        ];
        $product->setCustomAttribute(new CustomAttribute($customAttribute));

        return $product;
    }

    public function run()
    {
        echo "============================================================ Product A:\n";
        $productA = $this->initProductA();
        var_dump($productA);
        echo "============================================================ Product B:\n";
        $productB = $this->initProductB();
        var_dump($productB);
        $configurableProduct = new ConfigurableProduct();
        $configurableProduct->add($productA);
        $configurableProduct->add($productB);
        echo "============================================================ Configurable Product:\n";
        var_dump($configurableProduct->getList());
        echo "============================================================ Configurable Product after duplicated adding:\n";
        $configurableProduct->add($productA);
        var_dump($configurableProduct->getList());
        echo "============================================================ Configurable Product after adding product which has various attribute:\n";
        $productB->setPrice(120);
        $configurableProduct->add($productB);
        var_dump($configurableProduct->getList());
        die;
    }
}