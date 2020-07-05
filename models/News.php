<?php

class News
{
    const SHOW_BY_DEFAULT = 3;

    public  static function getNewsList($page = 1)
    {

        $limit = News::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $newsList = array();
        $i = 0;
        $connection = DataBase::getConnection();
        $stmt = $connection->query("SELECT * FROM news ORDER BY date DESC LIMIT $limit OFFSET $offset");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['preview'] = $row['preview'];
            $i++;
        }
        return $newsList;
    }

    public  static function getNewsById($id)
    {
        $id = intval($id);
        $connection = DataBase::getConnection();
        $stmt = $connection->query("SELECT * FROM news WHERE id=" . $id);
        $newsItem = $stmt->fetch(PDO::FETCH_ASSOC);
        return $newsItem;
    }

    public static function getTotalNews()
    {
        $connection = DataBase::getConnection();
        $stmt = $connection->query("SELECT count(id) AS count FROM news");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }
}