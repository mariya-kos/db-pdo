<?php
//setcookie('result', getResult(), time()+60*60);
//header('Location: ' . $_SERVER['HTTP_REFERER']);
getResult();
function getResult() {
    $dsn = 'mysql:dbname=example;host=127.0.0.1';
    $user = 'root';
    $password = '';
    try {
        $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $names = ''; $tables = '';
        foreach ($_REQUEST as $name => $value) {
            if($value) {
                $names .= ($names) ? ", `$name`" : "`$name`";
                $table = substr($name, 0, strpos($name, '_'));

                $tables .= ($tables) ?
                    ((substr($tables, 0, strpos($tables, "$table")) ? "" : " INNER JOIN `$table`")) :
                    "`$table`";
            }
        }

        $sql = "SELECT $names FROM $tables ON `category`.category_id=`product`.product_category_id 
        WHERE `category`.category_name= ? AND `product`.product_name= ? AND `product`.product_type= ?";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(
            $_REQUEST['category_name'], $_REQUEST['product_name'], $_REQUEST['product_type']
        ));
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo $sth->queryString;
        echo '<pre>';
        print_r($result);
        echo implode(" ", $result);
        return (empty($result)) ? implode(" ", $result) : "Ничего не найдено.";
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
    }
}

