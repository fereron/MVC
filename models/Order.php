<?php

class Order
{


    public static function getOrdersList()
    {
        $orderList = array();
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM product_order ORDER BY id ASC');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $orderList[$i]['id'] = $row['id'];
            $orderList[$i]['name'] = $row['name'];
            $orderList[$i]['telefon'] = $row['telefon'];
            $orderList[$i]['comment'] = $row['comment'];
            $orderList[$i]['products'] = $row['products'];
            $i++;
        }
        return $orderList;
    }

    public static function getOrderById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }


    public static function getStatusText($status)
    {
        switch ($status) {
            case '0':
                return 'Новый заказ';
                break;
            case '1':
                return 'В обработке';
                break;
        }
    }


    public static function deleteOrderById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();
        $sql = 'DELETE FROM product_order WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

}