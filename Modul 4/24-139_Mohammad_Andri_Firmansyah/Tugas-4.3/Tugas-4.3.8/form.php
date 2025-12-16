<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post">
        <label for="username">
            Username :
            <input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
        </label>
        <br>
        <label for="nim">
            NIM :
            <input type="text" name="nim" value="<?php if (isset($_POST['nim'])) echo $_POST['nim']; ?>">
        </label>
        <br>
        <label for="email">
            Email :
            <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
        </label>
        <br>
        <label for="password">
            Password :
            <input type="text" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
        </label>
        <br>
        <button type="submit" name="submit">Submit</button>
        <br><br>
    </form>

    <?php

    $errors = array();

    if (isset($_POST['submit'])){

        require 'validasi.inc';
        validasiNama($errors, $_POST, 'username');
        validasiNim($errors, $_POST, 'nim');
        validasiEmail($errors, $_POST, 'email');
        validasiPassword($errors, $_POST, 'password');
        if ($errors){
            echo 'Error<br>';
            foreach ($errors as $field => $error)
                echo "$field $error<br>";
        } else{
            echo 'Form berhasil disubmit';
        }
    }

    ?>
    
</body>
</html>