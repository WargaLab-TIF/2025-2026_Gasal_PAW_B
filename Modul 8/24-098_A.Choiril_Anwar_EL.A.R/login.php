<?php
include "function.php";
if (isset($_POST['login'])) {
    $loginresult = checklogin($_POST);
    if ($loginresult !== true) {
        $error = $loginresult;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5 bg-white p-4 rounded-4 shadow">

        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Login Sistem</h3>
            <p class="text-muted small">Silakan masuk untuk melanjutkan</p>
        </div>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100 py-2 fw-semibold">
                LOGIN
            </button>
        </form>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
