<?php
include "config.php";

// Proses jika tombol register ditekan
if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi MD5
    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $hp       = $_POST['hp'];
    $level    = $_POST['level'];

    // Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    
    if(mysqli_num_rows($cek) > 0){
        $msg = "<div class='alert alert-danger'>Username sudah digunakan!</div>";
    } else {

        $query = "INSERT INTO user (username, password, nama, alamat, hp, level)
                  VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')";
        
        if(mysqli_query($conn, $query)){
            $msg = "<div class='alert alert-success'>
                        Registrasi berhasil! <a href='login.php'>Login sekarang</a>
                    </div>";
        } else {
            $msg = "<div class='alert alert-danger'>Registrasi gagal!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width:400px; border-radius:15px;">
        <h3 class="text-center mb-3">Register</h3>

        <?php if(isset($msg)) echo $msg; ?>

        <form method="POST">

            <div class="mb-2">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="2" required></textarea>
            </div>

            <div class="mb-2">
                <label class="form-label">No. HP</label>
                <input type="text" name="hp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Level</label>
                <select name="level" class="form-select" required>
                    <option value="">-- Pilih Level --</option>
                    <option value="1">Admin</option>
                    <option value="2">Kasir</option>
                </select>
            </div>

            <button type="submit" name="register" class="btn btn-success w-100">
                Register
            </button>
        </form>

        <p class="text-center mt-3">
            Sudah punya akun? <a href="login.php">Login</a>
        </p>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
