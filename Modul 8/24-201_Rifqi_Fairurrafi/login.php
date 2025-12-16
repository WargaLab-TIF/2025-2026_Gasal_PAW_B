<?php
session_start();
require 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) > 0){
        $user = mysqli_fetch_assoc($query);

        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['level'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="container bg-light d-flex justify-content-center align-items-center vh-100">
    <div >
        <form action="" method="post">
            <h2 class="text-primary">Login Admin</h2>
            <input type="text" name="username" class="border rounded-top p-2 fs-5" placeholder="Username" required><br>
            <input type="password" name="password" class="border rounded-bottom p-2 fs-5" placeholder="Password" required><br>
            <button type="submit" class="btn btn-blue-gradient px-3 py-3 mt-2 w-100">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>