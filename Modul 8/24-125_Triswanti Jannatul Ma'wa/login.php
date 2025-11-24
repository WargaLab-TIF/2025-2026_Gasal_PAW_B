<?php
require 'function.php';

if(isset($_POST['login'])){
    $loginResult = checklogin($_POST);
    if ($loginResult !== true){
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
            background: #e6e6e6; 
        }
        .login-box {
            width: 380px;
        
            padding: 35px;
            border-radius: 8px;
            margin-top: 120px;
        }
        .btn-gradient {
            background: linear-gradient(to bottom, #4da6ff, #0073e6);
            color: white;
            font-weight: bold;
            border: none;
        }
        .login-title {
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #0263d5;
        }
        input.form-control {
            height: 48px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="login-box shadow">
        <h4 class=" login-title">Login Admin</h4>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger py-2"><?= $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-0">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-2">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-gradient w-100 py-2">Login</button>
        </form>
    </div>
</div>
</body>
</html>
