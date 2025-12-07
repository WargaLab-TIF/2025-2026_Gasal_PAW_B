<?php
include "config.php";
session_start();
function check_user_login(array $data)
{
    global $conn;
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? null;
    if ($password) {
        $password = md5($data['password']);
    }

    $SQL = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $SQL);
    if (mysqli_num_rows($result) > 0) {
        $userdata = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $userdata['nama'];
        $_SESSION['role'] = ($userdata['role'] == '1') ? "Admin" : "user";
        header("Location: index.php");
        exit();
    } else {
        return "Username Dan Password Salah!";
    }
}

function is_login()
{
    if (isset($_SESSION['user']) && isset($_SESSION['role'])) {
        header('Location: index.php');
        exit();
    }
}
