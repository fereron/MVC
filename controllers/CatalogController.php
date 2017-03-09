<?php

class CatalogController
{

    public function actionView($page = 1)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $productList = array();
        $productList = Product::getLatestProducts($page);

        $total = Product::getTotalProducts();
        $pagination = new Pagination($total, $page, '12' , 'page-');

        require_once ROOT. '/views/catalog/index.php';

        return true;

    }

    public function actionCategory($category_id, $page = 1)
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $productList = array();
        $productList = Product::getProductListByCategory($category_id, $page);

        $total = Product::getTotalProductsInCategory($category_id);
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT. '/views/catalog/category.php';

        return true;

    }

}