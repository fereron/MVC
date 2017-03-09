<?php

class AdminProductController extends AdminBase
{

    public function actionIndex()
    {
        self::checkAdmin();

        $productList = Product::getProductList();

        require_once (ROOT. '/views/admin_product/index.php');

        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Product::deleteProductById($id);

            header("Location: /admin/product");
        }

        require_once (ROOT. '/views/admin_product/delete.php');

        return true;
    }


    public function actionCreate()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesList();

        if ( isset($_POST['submit']))  {

            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

           $errors = false;

           //Валидация полей!!


            if (!$errors)   {

            $id = Product::CreateProduct($options);

            //Проверка загрузки изображения
                if ($id) {

                 if  ( is_uploaded_file($_FILES['image']['tmp_name']) ) {

                     move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/{$id}.jpg");
                    }

                }
                header('Location: /admin/product');
            }
        }

        require_once (ROOT. '/views/admin_product/create.php');

        return true;
    }


    public function actionUpdate($id)
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesList();

        $product = Product::getProductsById($id);



        if ( isset($_POST['submit']))   {
//            echo '<pre>';
//            print_r($_POST);
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
//            $options['image'] = $_POST['image'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];

            $errors = false;

            //Валидация полей!!


            if (!$errors)   {

               if ( Product::updateProductById($id, $options) ) {

                   //Проверка загрузки изображения
                   if  ( is_uploaded_file($_FILES['image']['tmp_name']) ) {

                       move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/product/{$id}.jpg");
                   }

               }
                header('Location: /admin/product');
            }

        }


        require_once (ROOT. '/views/admin_product/update.php');

        return true;
    }

}