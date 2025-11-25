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
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <div class="card p-5 shadow-sm border-0" style="width: 400px;">

        <h2 class="text-center mb-4 fw-bold" style="color:#3498db;">Login Admin</h2>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger py-2"><?= $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <input type="text" 
                       name="username" 
                       class="form-control form-control-lg" 
                       placeholder="Username" required>
            </div>

            <div class="mb-4">
                <input type="password" 
                       name="password" 
                       class="form-control form-control-lg" 
                       placeholder="Password" required>
            </div>

            <button type="submit" 
                    name="login" 
                    class="btn btn-primary btn-lg w-100">
                Login
            </button>
        </form>

    </div>

</div>

</body>
</html>
