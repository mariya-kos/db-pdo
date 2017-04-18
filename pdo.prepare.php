<?php
$dsn = 'mysql:dbname=example;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);

    $sql = 'SELECT product_name, product_type, product_price FROM product WHERE product_price > :product_price';
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':product_price' => 1200));
    $normal_price = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($normal_price);
    $sth->execute(array(':product_price' => 1500));
    $normal_price = $sth->fetchAll(PDO::FETCH_ASSOC);
    print_r($normal_price);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}