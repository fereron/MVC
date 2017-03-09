<?php

class CartController
{

    public function actionAdd($id)
    {
        //Добавляем товар в корзину
        Cart::addProduct($id);


        //Перенаправляем пользователя на страницу обратно
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

    }


    public function actionView()
    {
        //Выводим категории в сайдбаре
        $categories =array();
        $categories = Category::getCategoriesList();

        //Проверяем есть ли в сессии товары, если есть то присваиваем массиву $productsInCart
        $productsInCart = false;
        $productsInCart = Cart::getProducts();


        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Cart::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }



        require_once (ROOT . '/views/cart/index.php');

        return true;
    }


    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);

        return true;

    }


    public function actionCheckOut()
    {
        if (Cart::countItemsInCart() == 0) {
            header("Location: /");
        }

        $productsInCart = Cart::getProducts();
        $productsIds = array_keys($productsInCart);
        $products = Cart::getProductsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $tel = $_POST['tel'];
            $comment = $_POST['comment'];

            $errors = false;

            if (!User::checkName($name))  {
                $errors[] = 'Введите имя!';
            }

            if (!$errors) {

                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }


               $result = Product::Save($name, $tel, $comment, $userId, $productsInCart);

                if ($result) {

                    $to = "fererone@gmail.com";
                    $subject = "URL_of_orders";
                    $message = "name: $name,\r\n tel: $tel,\r\n comment: $comment";

                    $success = mail($to, $subject, $message);

                    Cart::Clear();
                }
            }

        }
//            else {
//
//                $productsInCart = Cart::getProducts();
//                $productsIds = array_keys($productsInCart);
//                $products = Cart::getProductsByIds($productsIds);
//                $totalPrice = Cart::getTotalPrice($products);
//
//            }


        require_once (ROOT. '/views/cart/checkout.php');

        return true;
    }


    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        header("Location: /cart/");
    }

}