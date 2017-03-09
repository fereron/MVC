<?php

class Article
{

    public static function getArticlesList()
    {
        $articles = array();
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM article ORDER BY id DESC");
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $articles[$i]['id'] = $row['id'];
            $articles[$i]['title'] = $row['title'];
            $articles[$i]['text'] = $row['text'];
            $i++;
        }

        return $articles;
    }

}