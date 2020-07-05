<?php

class UserController
{

    public function actionLogin()
    {
        $email = false;
        $password = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userNameError = User::checkEmail($email);
            $userPassError = User::checkPassword($password);

            if ($userNameError === true && $userPassError === true)
            {
                $userId = User::checkUserData($email, $password);

                if ($userId) {
                    User::auth($userId);
                    header("Location: /admin");
                } else {
                    User::setErrorsSession('userNotFound', "User not found");
                }
            } else {
                $userNameError = User::checkEmail($email);
                $userPassError = User::checkPassword($password);

                User::setErrorsSession('emailError', $userNameError);
                User::setErrorsSession('passwordError', $userPassError);
            }
        } else {
            User::unsetErrorsSession();
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        session_start();

        unset($_SESSION["user"]);

        header("Location: /admin");
    }

}
