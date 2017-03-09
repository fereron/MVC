<?php

class Product
{
    const SHOW_BY_DEFAULT = 3;


    public static function getLatestProducts( $page = 1)
    {
        $count = 12;
        $page = intval($page);
        $offset = ($page - 1) * $count;


        $db = Db::getConnection();
        $productList = array();
        $result = $db->query("SELECT id, name, price, is_new FROM product WHERE status = '1' ORDER BY id DESC LIMIT ". $count ." OFFSET ". $offset);

        $i=0;
        while($row = $result->fetch()) {
          $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
//            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productList;
    }


    public static function getProductListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, is_new FROM product WHERE status = '1' AND category_id = '$categoryId' ORDER BY id DESC LIMIT " .self::SHOW_BY_DEFAULT . " OFFSET ". $offset);

            $i=0;
            while ( $row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
//                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }


    public static function getProductsById($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM product WHERE id = ". $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();

        }
    }


    public static function getTotalProductsInCategory($category_id)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT count(id) AS count FROM product WHERE status = '1' AND category_id = ". $category_id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['count'];
    }

    public static function getTotalProducts()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT count(id) AS count FROM product WHERE status = '1'");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['count'];
    }

    public static function getRecommendedProducts()
    {
        $products = array();

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM product WHERE status = '1' AND is_recommended = '1' ORDER BY id DESC");

        $i = 0;
        while ($row = $result->fetch())  {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
//            $products[$i]['image'] = $row['image'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $products;
    }

    public static function Save($name, $tel, $comment, $userId, $productsInCart)
    {
        $productsInCart = json_encode($productsInCart);

        $db = Db::getConnection();
        $sql = "INSERT INTO product_order (name, telefon, comment, userId, products) VALUES (:name, :tel, :comment, :userId, :productsInCart)";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':tel', $tel, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_STR);
        $result->bindParam(':productsInCart', $productsInCart, PDO::PARAM_STR);
        return $result->execute();
    }


    public static function getProductList()
    {
        $productList = array();

        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM product ORDER BY id ASC");

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['category_id'] = $row['category_id'];
            $productList[$i]['code'] = $row['code'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['availability'] = $row['availability'];
            $productList[$i]['brand'] = $row['brand'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['is_recommended'] = $row['is_recommended'];
            $productList[$i]['status'] = $row['status'];
            $i++;
        }

        return $productList;
    }

    public static function getProductsByIdList($ids)
    {
        $products = array();

        $idString = implode(',', $ids);

        $db = Db::getConnection();
        $sql = "SELECT * FROM product WHERE id IN ($idString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }


    public static function deleteProductById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();
        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function CreateProduct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product '
               . '    (name, code, price, category_id, brand, availability, description, is_new, is_recommended, status)'
            . 'VALUES (:name, :code, :price, :category_id, :brand, :availability,:description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {

            return $db->lastInsertId();
        }
        return 0;

    }

    public static function updateProductById($id, $options)
    {
        $id = intval($id);

        $db = Db::getConnection();

        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();

    }


    public static function getImage($id) {

        //Название изображения пустышки
        $noImage = 'no-image.jpg';

        //Путь к папке с изображениями
        $path = '/upload/images/product/';

        //Путь к изображению
        $pathToProductImage = $path . $id . '.jpg';

        if ( file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {

            return $pathToProductImage;
        }

        return $path . $noImage;

    }

}