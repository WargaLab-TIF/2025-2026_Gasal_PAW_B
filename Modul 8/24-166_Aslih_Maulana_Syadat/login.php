<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$u' AND password='$p'");
    if (mysqli_num_rows($q) > 0) {
        $d = mysqli_fetch_assoc($q);
        $_SESSION['status'] = "login";
        $_SESSION['nama'] = $d['nama'];
        $_SESSION['level'] = $d['level'];
        header("location:index.php");
    } else {
        $err = "Username atau Password Salah!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-wrapper">
        <div class="login-box">
            <h2>LOGIN USER</h2>
            <?php if (isset($err)) echo "<p style='color:red'>$err</p>"; ?>
            <form method="post">
                <div class="form-group"><input type="text" name="username" placeholder="Username" required></div>
                <div class="form-group"><input type="password" name="password" placeholder="Password" required></div>
                <button type="submit" name="login" class="btn btn-blue" style="width:100%">LOGIN</button>
            </form>
        </div>
    </div>
</body>

</html>