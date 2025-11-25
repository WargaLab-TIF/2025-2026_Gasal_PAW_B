<?php
session_start();
require 'koneksi.php';

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
    $data = mysqli_fetch_assoc($sql);

    if($data){
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama']     = $data['nama'];
        $_SESSION['level']    = $data['level'];

        header("Location: home.php");
    } else {
        echo "<script>alert('Login gagal!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="login_form">

        <h2>Login Form</h2>
        <form method="POST">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
        <a href="./register.php">Register</a>        
    </form>
</div>
</body>
</html>