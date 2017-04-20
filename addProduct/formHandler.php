<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);

$dsn = 'mysql:dbname=example;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);

    $sql = 'INSERT INTO `product`(product_name, product_type, product_category_id) VALUES (:name, :type, :category_id)';
    $sth = $dbh->prepare($sql);
    $sth->execute(array(
        ':name' => $_REQUEST['product_name'],
        ':type'=> $_REQUEST['product_type'],
        ':category_id'=> intval($_REQUEST['category_id'])
    ));
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
