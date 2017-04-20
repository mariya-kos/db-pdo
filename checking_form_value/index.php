<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script
            src="https://code.jquery.com/jquery-3.2.0.min.js"
            integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
            crossorigin="anonymous">
    </script>
</head>
<body>
    <style>
        form {
            width: 250px;
        }
        form input {
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
            <input type="text" name="category_name" required>
        </label>
        <label>
            Brand name:
            <input type="text" name="product_name" required>
        </label>
        <label>
            Model name:
            <input type="text" name="product_type" required>
        </label>
        <input type="submit" value="Send">
    </form>

    <?php
    echo "<pre>";
    print_r($_COOKIE);
    $result = false;
    if ($_COOKIE['result']) {
        $result = $_COOKIE['result'];
    }
    var_dump($result);

    ?>

    <script type="text/javascript">
        $('form>label>input').blur(function() {
            var input = $(this);
            var data = $(this).attr('name') + "=" + $(this).val();
            $.ajax({
                type: "POST",
                url: "inputHandler.php",
                data: data,
                success: function(returnData) {
                    if (returnData) {
                        $(input).css({"border" : "2px solid green"});
                    } else {
                        $(input).css({"border" : "2px solid red"});
                    }
                }
            });
        });
    </script>
</body>
</html>


