<?php 
session_start(); // Mulai sesi untuk simpan data login
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>

<h2>Login</h2>

<?php 
// Jika login gagal, tampilkan pesan error
if(isset($_GET['error'])) { ?>
    <div style="color:red;">Username atau Password salah</div>
<?php } ?>

<!-- Form login kirim ke proses_login.php -->
<form action="proses_login.php" method="post">
    Username : <br>
    <input type="text" name="username" required><br><br>

    Password : <br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
