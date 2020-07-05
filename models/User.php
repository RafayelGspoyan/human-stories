<?php

class User
{
    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function getUserById($id)
    {
        $db = DataBase::getConnection();

        $sql = 'SELECT * FROM users WHERE user_id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function checkUserData($email, $password)
    {
        $connect = DataBase::getConnection();

        $sql = 'SELECT * FROM users WHERE email = :email';

        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($stmt->rowCount() == 1 && password_verify($password, $user['password'])) {
            return $user['user_id'];
        } else {
            $_SESSION['errors']['login'] = "User email/password is incorrect";
            return false;
        }
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkPassword($password)
    {
        if (empty($password)){
            return "Password is required";
        } elseif (strlen($password) < 6) {
            return "Password is too short";
        } else {
            return true;
        }
    }

    public static function checkEmail($email)
    {
        if (empty($email)){
            return "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Not correct email";
        } else {
            return true;
        }
    }

    public static function setErrorsSession($key, $val)
    {
        $_SESSION['errors'][$key] = $val;
    }

    public static function unsetErrorsSession()
    {
        unset($_SESSION['errors']);
    }

}