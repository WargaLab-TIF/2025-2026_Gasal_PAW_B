<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Implementasi string</h2>
    <form action="Tugas-4.3.2.php" method="post">
        <label for="fullname">
            Masukan Nama Lengkap:
            <input type="text" name="fullname">
        </label>
        <br>
        <label for="username">
            Masukkan Username:
            <input type="text" name="username">
        </label>
        <br>
        <button type="submit" name="submit">Submit</button>
        <br><br>

        <?php

        if (isset($_POST['submit'])) {
            $fname = trim($_POST['fullname'], "!@#$%^&*");
            $uname = trim($_POST['username'], "!@#$%^&*");

            echo strtoupper($fname) . "<br>";
            echo strtolower($uname) . "<br>";
        }

        ?>

    </form>
</body>
</html>