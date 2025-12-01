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

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #e6e6e6;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 420px;
        background: #f4f4f4;
        margin: 80px auto;
        padding: 35px 30px 45px;
        border-radius: 6px;
        box-shadow: 0px 0px 7px rgba(0,0,0,0.15);
        text-align: center;
    }

    h2 {
        margin-bottom: 25px;
        color: #3b6ea5;
        font-size: 26px;
        font-weight: 600;
    }

    .input-box {
        width: 100%;
        margin-bottom: 15px;
    }

    .input-box input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 15px;
        background-color: white;
    }

    .btn {
        width: 100%;
        padding: 12px 0;
        margin-top: 5px;
        background: linear-gradient(to bottom, #51a9e8, #2672d1);
        border: none;
        border-radius: 4px;
        font-size: 17px;
        color: white;
        cursor: pointer;
    }

    .btn:hover {
        opacity: .9;
    }
</style>
</head>
<body>

<div class="container">

    <h2>Login Admin</h2>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="input-box">
            <input type="text" name="username" placeholder="Username">
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password">
        </div>

        <button type="submit" name="login" class="btn">Login</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
