<?php
require 'function.php';

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
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <div class="login-wrapper">
        <div class="login-box">
            <div class="tengah bawah3">
                <h2 style="color: #337ab7; margin: 0; font-weight: 300;">Login Admin</h2>
            </div>

            <?php if (isset($error)) : ?>
                <div class="pesan pesanerr">
                    <?= $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="bawah3">
                    <input type="text" class="input" id="username" name="username" placeholder="Username" >
                </div>
                <div class="bawah3">
                    <input type="password" class="input" id="password" name="password" placeholder="Password" >
                </div>
                <div>
                    <button type="submit" name="login" class="tombol tombol-biru">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>