<?php

//require_once ROOT . '/models/News.php';

class NewsController
{
    public function actionIndex($page = 1)
    {
        $newsList = array();
        $newsList = News::getNewsList($page);

        $total = News::getTotalNews();

        $pagination = new Pagination($total, $page, News::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/news/index.php');
    }

    public function actionView($id)
    {
        $newsItem = News::getNewsByID($id);

        require_once(ROOT . '/views/news/view.php');
    }
}