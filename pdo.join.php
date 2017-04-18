<?php
$dsn = 'mysql:dbname=auto;host=127.0.0.1';
$user = 'root';
$password = '';

$user_login = $_REQUEST['login'];
$user_pass = $_REQUEST['password'];
$user_name = $_REQUEST['username'];
$user_surname = $_REQUEST['surname'];
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $sth = $dbh->query("SELECT * FROM `auto` INNER JOIN `model` ON `auto`.auto_id = `model`.model_id_mark ");
    $inner_result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = $dbh->query("SELECT * FROM `auto` RIGHT JOIN `model` ON `auto`.auto_id = `model`.model_id_mark ");
    $right_result = $sth->fetchAll(PDO::FETCH_ASSOC);
    $sth = $dbh->query("SELECT * FROM `auto` LEFT JOIN `model` ON `auto`.auto_id = `model`.model_id_mark ");
    $left_result = $sth->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    echo 'inner join : <br>';
    print_r($inner_result);
    echo 'right join : <br>';
    print_r($right_result);
    echo 'left join : <br>';
    print_r($left_result);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}