<?php
$dsn = 'mysql:dbname=example;host=127.0.0.1';
$user = 'root';
$password = '';

$user_login = $_REQUEST['login'];
$user_pass = $_REQUEST['password'];
$user_name = $_REQUEST['username'];
$user_surname = $_REQUEST['surname'];
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $sth_user = $dbh->exec("INSERT INTO `user` SET `login` = '$user_login', `password` = '$user_pass'");
    $id = $dbh->lastInsertId();
    echo $sth_user;
    $sth_iser_info = $dbh->exec("INSERT INTO `user_info` SET `name` = '$user_name', `surname` = '$user_surname',  `user_id` = ".$id);
    echo $sth_iser_info;
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}