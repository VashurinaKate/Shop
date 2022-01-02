<?php
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','shop');
define('DB_USER','root');
define('DB_PASS','root');

$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
$db = new PDO($connect_str,DB_USER,DB_PASS);

$error_array = $db->errorInfo();

if($db->errorCode() != 0000)
    echo "SQL ошибка: " . $error_array[2] . '<br />';
    
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
