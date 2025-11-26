<?php 
include 'koneksi.php';

$error = "";

if (isset($_POST['register'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $nama     = trim($_POST['nama']);
    $role     = '2';
    
    if ($username == "" || $password == "" || $nama == "") {
        $error = "Semua field wajib diisi!";
    } else {

        $check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Username sudah digunakan!";
        } else {
            $pass = md5($password);
            $query = "INSERT INTO user (username, password, nama, role) 
                      VALUES ('$username', '$pass', '$nama', '$role')";

            if (mysqli_query($conn, $query)) {
                echo "<script>
                        alert('Registrasi Berhasil! Silakan Login.');
                        document.location.href = 'master1.php';
                      </script>";
                exit;
            } else {
                $error = "Registrasi gagal: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">

    <h3>Tambah User Baru</h3>

    <?php if ($error != "") : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" name="register" class="btn btn-primary">Register</button>
        <a href="master1.php" class="btn btn-secondary">Kembali</a>

    </form>

</body>
</html>
