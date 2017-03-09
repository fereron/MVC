<?php


class BlogController
{

    public function actionIndex()
    {
        $articlesList = Article::getArticlesList();


        require_once (ROOT. '/views/blog/index.php');

        return true;
    }



}