<?php
// Menghubungkan dengan file config untuk koneksi database
require "config.php";

// Cek jika form login disubmit
if (isset($_POST['login'])) {
    // Mengambil input username dan password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari data user yang cocok di database
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data  = mysqli_fetch_assoc($query);  // Mengambil hasil query

    // Jika data ditemukan, buat session user dan arahkan ke halaman utama
    if ($data) {
        $_SESSION['user'] = $data;
        header("Location: index.php");  // Redirect ke index.php setelah login
        exit;
    } else {
        // Jika login gagal, tampilkan pesan error
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f7f7f7; }
        .login-card {
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<!-- Form Login di tengah layar -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4 login-card bg-white">

        <h3 class="text-center mb-4">Login</h3>

        <!-- Tampilkan error jika login gagal -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center py-2"><?= $error ?></div>
        <?php endif; ?>

        <!-- Form input username dan password -->
        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Tombol login -->
            <button type="submit" name="login" class="btn btn-primary w-100 mt-2">Login</button>

        </form>
    </div>
</div>

</body>
</html>
