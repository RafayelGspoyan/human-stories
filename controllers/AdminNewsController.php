<?php

class AdminNewsController extends AdminBase
{

    public function actionIndex()
    {
        self::checkAdmin();

        $newsList = AdminNews::getNewsList();

        require_once(ROOT . '/views/admin_news/index.php');
        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $category = Category::getCategory();
        if (isset($_POST['submit'])) {
            if ($_FILES['image']['name'] == '') {
                $options['image'] = "/upload/images/noimage.png";
            } else {
                $options['image'] = "/upload/images/" . $_FILES['image']['name'];
            }
            $options['title'] = $_POST['title'];
            $options['category'] = $_POST['category'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $errors = false;

            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Type the title';
            }

            if ($errors == false) {
                $id = AdminNews::createNews($options);

                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/{$_FILES['image']['name']}");
                    }
                }

                header("Location: /admin/news");
            }
        }

        require_once(ROOT . '/views/admin_news/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $i = 0;
        self::checkAdmin();

        $newsItem = AdminNews::getNewsById($id);

        if (isset($_POST['submit'])) {
            if ($_FILES['image']['name'] == '') {
                $options['image'] = $newsItem['image'];
            } else {
                $options['image'] =/* "/upload/images/" .*/ $_FILES['image']['name'];
            }
            $options['title'] = $_POST['title'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];

            if (AdminNews::updateNewsById($id, $options)) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . /*/upload/images/*/"{$_FILES['image']['name']}");
                }
            }

            header("Location: /admin/news");
        }

        require_once(ROOT . '/views/admin_news/update.php');
        return true;
    }
    public function actionCategory(){
        if(isset($_POST["button"])){
                $categoryName = $_POST["category"];
                echo $categoryName;
                Category::addCategory($categoryName);
                header("Location: /admin");

        }
        require_once  (ROOT . "/views/admin_news/category.php");
    }
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])) {
            AdminNews::deleteNewsById($id);

            header("Location: /admin/news");
        }

        require_once(ROOT . '/views/admin_news/delete.php');
        return true;
    }
}
