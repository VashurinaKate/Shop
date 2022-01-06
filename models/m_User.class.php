<?php
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','shop');
define('DB_USER','root');
define('DB_PASS','root');

session_start();

class M_User {
    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'shop';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    function getUserId() {
        $connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
        $db = new PDO($connect_str,self::DB_USER,self::DB_PASS);

        $email = $_SESSION['email'];
        $sql = "SELECT id FROM users WHERE email='$email'";
        $res = $db->prepare($sql);
        $res->execute();
        $userId = $res->fetchColumn();
        if ($userId) {
            return $userId;
        } else {
            return false;
        }
        unset($db);
    }

	function auth($email, $password) {
	    $connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
        $db = new PDO($connect_str,self::DB_USER,self::DB_PASS);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $res = $db->prepare($sql);
        $res->execute();
        $data = $res->fetchAll(PDO::FETCH_ASSOC);
        if ($data) {
            $_SESSION['is_auth'] = true;
            $_SESSION['email'] = $email;
            // return $data;
            return true;
        } else {
            $_SESSION['is_auth'] = false;
            return false;
        }
        unset($db);
    }

    function logout() {
        $_SESSION = array();
        session_destroy();
    }

    function isAuth() {
        if (isset($_SESSION['is_auth'])) {
            return $_SESSION['is_auth'];
        } else return false;

    }

    function register($name, $surname, $email, $password) {
        $connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
        $db = new PDO($connect_str,self::DB_USER,self::DB_PASS);

        $sql = "INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)";
        $res = $db->prepare($sql);
        $data = $res->execute([$name, $surname, $email, $password]);
        // проверить на существование email
        // $update = "UPDATE users SET password=md5(password)"; // шифрование
        if ($data) {
            return true;
        } else {
            // die("Error");
            return false;
        }
        unset($db);
    }
}
