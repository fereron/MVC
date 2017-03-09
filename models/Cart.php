<?php

class Cart
{

    public static function addProduct($id)
    {
        $id = intval($id);

        //Пустой массив для товаров в корзине
        $productsInCart = array();

        //Если существует сессия с товарами
        if (isset($_SESSION['products'])) {
            //То заполняем ее предыдущими товарами
            $productsInCart = $_SESSION['products'];
        }

        //Если в данном массиве уже существовал до этого этот id товара то увеличиваем на 1
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        }   else {
            $productsInCart[$id] = 1;
        }


        $_SESSION['products'] = $productsInCart;

        return self::countItemsInCart();

//        echo '<pre>';
//        print_r(self::countItemsInCart());
//        die();
    }


    public static function countItemsInCart()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        }
        else {
            return 0;
        }

    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }

        return false;
    }

    public static function getProductsByIds($productId)
    {
        $products = array();

        $db =Db::getConnection();

        $idsString = implode(',', $productId);

        $sql = "SELECT * FROM product WHERE status = '1' AND id IN ($idsString)";

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }

    public static function getTotalPrice($products)
    {
        $productInCart = self::getProducts();

        $count = 0;
        if ($productInCart)  {
            foreach ($products as $item) {
                $count = $item['price'] * $productInCart[$item['id']];
            }
        }

        return $count;

    }

    public static function Clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    public static function deleteProduct($id)
    {

        unset($_SESSION['products'][$id]);
    }

}