<?php

return array(
    'product/([0-9]+)' => 'product/view/$1',         //actionView в ProductController

    'catalog/page-([0-9]+)' => 'catalog/view/$1',                     //actionView в CatalogController

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',    //actionCategory в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',    //actionCategory в CatalogController

    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',      //actionAddAjax в CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1',        //actionDelete в CartController
    'cart/checkout' => 'cart/checkout',                //actionCheckout в CartController
    'cart' => 'cart/view',                             //actionView в CartController


    'blog' => 'blog/index',                            //actionIndex в BlogController


    'cabinet/edit' => 'cabinet/edit',                  //actionEdit в CabinetController
    'cabinet' => 'cabinet/view',                       //actionView в CabinetController

    'user/register' => 'user/register',                //actionRegister в UserController
    'user/login' => 'user/login',                      //actionLogin в UserController
    'user/logout' => 'user/logout',                    //actionLogout в UserController

    //Управление товарами
    'admin/product/create' => 'adminProduct/create',                       //actionCreate в AdminProductController
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',           //actionUpdate в AdminProductController
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',           //actionDelete в AdminProductController
    'admin/product' => 'adminProduct/index',                               //actionIndex в AdminProductController

    //Управление категориями
    'admin/category/create' => 'adminCategory/create',                       //actionCreate в AdminCategoryController
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',           //actionUpdate в AdminCategoryController
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',           //actionDelete в AdminCategoryController
    'admin/category' => 'adminCategory/index',                               //actionIndex в AdminCategoryController

    //Управление заказами
    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',               //actionView в AdminCategoryController
    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',           //actionUpdate в AdminCategoryController
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',           //actionDelete в AdminCategoryController
    'admin/order' => 'adminOrder/index',                               //actionIndex в AdminCategoryController

    'admin' => 'admin/index',                          //actionIndex в AdminController

    '' => 'site/view',                               //actionView в SiteController

);