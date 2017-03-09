<?php
class User
{

    public static function register($name, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();
        $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function checkName($name){
        $name = trim($name);
        $name = htmlspecialchars($name);
        if (strlen($name) > 2) {
            return true;
        }
        return false;
    }


    public static function checkEmail($email){
        $email = trim($email);
        $email = htmlspecialchars($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    public static function checkPassword($password){
        if (strlen($password) > 5) {
            return true;
        }
        return false;
    }

    public static function checkUserData($email, $password)
    {

        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
//        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        $password = password_verify($password, $user['password']);

        if($user && $password) {
            return $user['id'];
        }

        return false;
    }


    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }

    public  static function checkLogged() {

        //Если СЕССИЯ существует, вернем id пользователя
        if(isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        //Если СЕССИИ нету, отправляем на страницу входа
        header('Location: /user/login');
    }


    public static function isGuest() {
        if(isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }


    public static function getUserById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM user WHERE id = ' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function isAdmin()
    {
        $userId = self::checkLogged();
        $user = self::getUserById($userId);

        if ($user['role'] == 'admin') {
            return true;
        }
        return false;
    }

    public static function edit($id, $name, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();
        $sql = "UPDATE user SET name = :name, password = :password WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        return $result->execute();


    }



}