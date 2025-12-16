<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'config.php';

function checkLogin($data) {
    global $conn;

    $username = $data['username'];
    $password = md5($data['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // SET SESSION YANG BENAR
        $_SESSION['nama']  = $user['nama'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level']; // <== PENTING: dipakai login.php!

        return true;
    } else {
        return "Username atau Password salah!";
    }
}
?>
