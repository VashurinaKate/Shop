<?php
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','shop');
define('DB_USER','root');
define('DB_PASS','root');

class M_User {
    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'shop';
    const DB_USER = 'root';
    const DB_PASS = 'root';

	function auth($email, $password) {
	    $connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
        $db = new PDO($connect_str,self::DB_USER,self::DB_PASS);

        $sql = "SELECT FROM users WHERE email=$email AND password=$password";
        $res = $db->prepare($sql);
        $data = $res->execute();
        if ($data) {
            return true;
        } else {
            return false;
            // die("Error");
        }
        unset($db);
        return true;
    }

    function isAuth($email, $password) {
	    $connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
        $db = new PDO($connect_str,self::DB_USER,self::DB_PASS);

        $sql = "SELECT FROM users WHERE email=$email AND password=$password";
        $res = $db->prepare($sql);
        $data = $res->execute();
        if ($data) {
            return true;
        } else {
            return false;
            // die("Error");
        }
        unset($db);
    }

    function register($name, $surname, $email, $password) {
        $connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
        $db = new PDO($connect_str,self::DB_USER,self::DB_PASS);

        $sql = "INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)";
        $res = $db->prepare($sql);
        $data = $res->execute([$name, $surname, $email, $password]);
        if ($data) {
            return true;
        } else {
            die("Error");
        }
        // $this->auth($email, $password);
        unset($db);
    }
}
