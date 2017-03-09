<?php


class Category
{


    public static function getCategoriesList()
    {
        $categories = array();

        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM category");

        $i = 0;
        while($row = $result->fetch()) {
            $categories[$i]['id'] = $row['id'];
            $categories[$i]['name'] = $row['name'];
            $categories[$i]['sort_order'] = $row['sort_order'];
            $categories[$i]['status'] = $row['status'];
            $i++;
        }

        return $categories;
    }


    public static function deleteCategoryById($id)
    {
        $id = intval($id);

        $db = Db::getConnection();
        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function CreateCategory($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO category '
            . '    (name, sort_order, status)'
            . 'VALUES (:name, :sort_order, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();

    }


    public static function getCategoryById($id)
    {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM category WHERE id = ". $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
    }


    public static function updateCategoryById($id, $options)
    {
        $id = intval($id);

        $db = Db::getConnection();

        $sql = "UPDATE category
            SET 
                name = :name, 
                sort_order = :sort_order,
                status = :status
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $options['sort_order'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();

    }


}