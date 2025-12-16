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
            <input type="text" name="username">
        </label>
        <br>
        <label for="nim">
            NIM :
            <input type="text" name="nim">
        </label>
        <br>
        <label for="email">
            Email :
            <input type="text" name="email">
        </label>
        <br>
        <label for="password">
            Password :
            <input type="text" name="password">
        </label>
        <br>
        <button type="submit" name="submit">Submit</button>
        <br><br>
    </form>

    <?php

    if (isset($_POST['submit'])){

        require 'validasi.inc';
        if (validasiNama($_POST, 'username')){
            echo 'Username berhasil disubmit<br>';
        } else{
            echo 'Username gagal disubmit<br>';
        }
        if (validasiNim($_POST, 'nim')){
            echo 'NIM berhasil disubmit<br>';
        } else{
            echo 'NIM gagal disubmit<br>';
        }
        if (validasiEmail($_POST, 'email')){
            echo 'Email berhasil disubmit<br>';
        } else{
            echo 'Email gagal disubmit<br>';
        }
        if (validasiPassword($_POST, 'password')){
            echo 'Password berhasil disubmit<br>';
        } else{
            echo 'Password gagal disubmit<br>';
        }

    }

    ?>
    
</body>
</html>