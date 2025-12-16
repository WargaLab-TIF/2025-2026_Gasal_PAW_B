<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        Nilai : <input type="number" name="nilai">
        <input type="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST["nilai"])) {
    $nilai = $_POST["nilai"];
    if ($nilai > 85) {
        echo "Grade nilai $nilai adalah A";
    } elseif ($nilai > 75) {
        echo "Grade nilai $nilai adalah B";
    } elseif ($nilai > 65) {
        echo "Grade nilai $nilai adalah C";
    } else {
        echo "Grade nilai $nilai adalah D";
    }
}
?>