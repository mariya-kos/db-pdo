<?php
$dsn = 'mysql:dbname=example;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    foreach ($_REQUEST as $name => $value) {
        if($value) {
            $table = substr($name, 0, strpos($name, '_'));
            $sth = $dbh->query("SELECT `$name` FROM `$table` WHERE `$name` = '$value'");
            echo $sth->fetch(PDO::FETCH_ASSOC);
        }
    }
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
