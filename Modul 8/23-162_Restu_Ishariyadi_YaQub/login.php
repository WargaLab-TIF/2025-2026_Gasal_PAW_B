<?php
require 'functions.php';

if (isset($_POST['login'])) {
    $loginResult = checkLogin($_POST);
    if ($loginResult !== true) {
        $error = $loginResult;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa; 
        }
        .login-container { 
            max-width: 550px; 
            width: 100%;
            margin-top: 100px; 
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="login-container card shadow-lg p-5">
            <div class="text-center mb-4">
                <h3 class="text-primary fw-bold">Login Sistem</h3>
                <p class="text-muted">Silakan masuk untuk melanjutkan</p>
            </div>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" name="login" class="btn btn-primary btn-lg">LOGIN</button>
                </div>
            </form>

            <div class="text-center mt-4">
                <p class="text-muted">Belum punya akun? <a href="register.php" class="text-decoration-none fw-bold">Daftar disini</a></p>
            </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>