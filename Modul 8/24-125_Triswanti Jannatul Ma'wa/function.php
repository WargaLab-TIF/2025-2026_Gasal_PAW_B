<?php
session_start();
include 'koneksi.php';

function checklogin ($data) {
    global $conn;

    $username = $data ['username'];
    $password = md5($data['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user']= $user['username'];

        $_SESSION['role']= ($user['level'] == '1') ? 'Admin' : 'User';
        header("Location: index.php");
    }else{
        return "username dan password anda salah";
    }
}