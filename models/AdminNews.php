<?php


class AdminNews
{
    public static function getNewsList()
    {
        $newsList = array();
        $i = 0;
        $connection = DataBase::getConnection();
        $stmt = $connection->query("SELECT * FROM posts ORDER BY date DESC LIMIT 10");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $newsList[$i]['id'] = $row['post_id'];
            $newsList[$i]['category_id'] = $row['category_id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['content'] = $row['content'];
            $newsList[$i]['preview'] = $row['image'];
            $i++;
        }
        return $newsList;
    }

    public static function createNews($options)
    {
        $connection = DataBase::getConnection();

        $stmt = 'INSERT INTO posts '
            . '(title,category_id, short_content, content,  image)'
            . 'VALUES '
            . '(:title,:category,:short_content, :content, :image)';

        $result = $connection->prepare($stmt);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $connection->lastInsertId();
        }
        return 0;
    }

    public static function getNewsById($id)
    {
        $connection = DataBase::getConnection();

        $stmt = 'SELECT * FROM posts WHERE category_id = :id';

        $result = $connection->prepare($stmt);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function updateNewsById($id, $options)
    {
        $connection = DataBase::getConnection();

        $stmt = "UPDATE posts
            SET 
                title = :title, 
                short_content = :short_content, 
                content = :content, 
                image = :image
            WHERE post_id = :post_id";

        $result = $connection->prepare($stmt);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':post_id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function deleteNewsById($id)
    {
        $connection = DataBase::getConnection();

        $stmt = 'DELETE FROM posts WHERE post_id = :id';

        $result = $connection->prepare($stmt);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}