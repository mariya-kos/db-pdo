<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <style>
        form {
            width: 250px;
        }
        form input, select {
            display: block;
            width: 80%;
            padding: 5px;
        }
        form>input {
            width: 40%;
            margin: 10px 0;
        }
    </style>

    <form action="formHandler.php">
        <label>
            Category:
            <select name="category_id" required>
                <?php
                $dsn = 'mysql:dbname=example;host=127.0.0.1';
                $user = 'root';
                $password = '';

                $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $sth = $dbh->query("SELECT * FROM `category`");
                $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
                foreach($categories as $value) {
                    echo '<option value="' . $value['category_id'] . '\">' . $value['category_name'] . '</option>';
                }
                ?>
            </select>
        </label>
        <label>
            Brand name:
            <input type="text" name="product_name" required>
        </label>
        <label>
            Model name:
            <input type="text" name="product_type" required>
        </label>
        <input type="submit" value="ADD">
    </form>
</body>
</html>


