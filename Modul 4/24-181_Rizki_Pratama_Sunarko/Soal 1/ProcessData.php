<?php
require 'validate.inc';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Validasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error {
            color: red;
            margin: 10px 0;
        }
        .success {
            color: green;
            margin: 10px 0;
        }
        a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    $errors = array();
    validateName($errors, $_POST, 'surname');

    if ($errors) {
        echo "<div class='error'>";
        foreach ($errors as $field => $error) {
            echo "$field is $error<br>";
        }
        echo "</div>";
    } else {
        echo "<div class='success'>Data OK!</div>";
    }
    ?>
    <a href='ProcessData.html'>Kembali ke form</a>
</body>
</html>