<?php
require 'koneksi.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $nama     = $_POST['nama'];
    $level    = $_POST['level'];
    $password = md5($_POST['password']); // MD5 encryption

    // Check if username exists
    $check = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Username already exists');</script>";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO user(username, password, nama, level)
                                      VALUES('$username', '$password', '$nama', '$level')");
        if($sql){
            echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Registration Failed');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="login_form">
<h2>Registration Form</h2>
<form method="POST">

    <label>Full Name:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>User Level:</label><br>
    <select name="level" required>
        <option value="1">Level 1 (Admin)</option>
        <option value="2">Level 2 (Staff)</option>
    </select><br><br>

    <button type="submit" name="register">Register</button>
</form>

<br>
<a href="login.php">Already have an account? Login</a>
</div>
</body>
</html>
