<?php

include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/Product.php';

class SiteController
{

    public function actionView()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productList = Product::getLatestProducts();
        $sliderProducts = Product::getRecommendedProducts();


        require_once ROOT. '/views/site/index.php';


        return true;
    }

}