<?php
class UserController
{

    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';

        if ( isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 3-х символов!';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Введите правильный Email!';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-х символов!';
            }

            if(!$errors) {
                $result = User::register($name, $email, $password);
            }

        }

        require_once ROOT. '/views/user/register.php';

        return true;
    }


    public function actionLogin()
    {
        $email = '';
        $password = '';

        if ( isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Вы ввели неверный Email или пароль!';
            }
            else {
                //Если все правильно запоминаем пользователя
                User::auth($userId);

                header('Location: /cabinet/');
            }
        }

        require_once ROOT. '/views/user/login.php';

        return true;
    }


    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }

}