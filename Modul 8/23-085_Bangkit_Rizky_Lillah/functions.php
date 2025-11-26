<?php
session_start();
require 'koneksi.php';

function checkLogin($data)
{
    $username = $data['username'];
    $password = md5($data['password']); 

    $query = mysqli_query($GLOBALS['conn'], 
        "SELECT * FROM user WHERE username='$username' AND password='$password'"
    );

    if (mysqli_num_rows($query) === 1) {
        $user = mysqli_fetch_assoc($query);

        $_SESSION['username'] = $user['username'];
        $_SESSION['nama']     = $user['nama'];
        $_SESSION['role']     = $user['role'];

        if ($user['role'] == "1") {
            header("Location: admin.php");
            exit;
        } 
        elseif ($user['role'] == "2") {
            header("Location: user.php");
            exit;
        } 
        else {
            return "Role tidak valid!";
        }

    } else {
        return "Username atau Password salah!";
    }
}
?>
