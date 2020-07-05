<?php

class Category{
    public static function getCategory(){
        $i = 0;
        $connection = DataBase::getConnection();
        $stmt = $connection->query("SELECT * FROM categories");
       while ( $row= $stmt->fetch(PDO::FETCH_ASSOC)){
           $category[$i]["name"] = $row["name"];
           $category[$i]["id"] = $row["category_id"];
           $i++;

       }
       return $category;
    }
    public static function addCategory($name){
        $connection = DataBase::getConnection();
        $stmt = 'INSERT INTO categories '
            . '(name)'
            . 'VALUES '
            . '(:name)';
                 $result = $connection->prepare($stmt);
            $result->bindParam(':name', $name, PDO::PARAM_STR);
        if ($result->execute()) {
            return $connection->lastInsertId();
        }
        return true;
    }
}