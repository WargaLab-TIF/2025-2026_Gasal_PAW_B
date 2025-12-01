<?php
require_once 'config.php';

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // pengecekan role
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $user['nama'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = ($user['role'] == '1') ? 'Admin' : 'User';
        header("Location: index.php");
        exit;
    } else {
        return "Username dan password anda salah";
    }
}


?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e9ecef;
        }

        .login-box {
            width: 420px;
            background: #ffffff;
            padding: 35px 40px;
            border-radius: 8px;
            margin-top: 110px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        }

        .login-title {
            color: #0d6efd;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .btn-gradient {
            background: linear-gradient(to bottom, #4da6ff, #007bff);
            border: none;
            color: white;
            padding: 10px;
            font-size: 18px;
        }

        .btn-gradient:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="login-box">

            <h3 class="text-center login-title">Login Admin</h3>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= $error; ?>
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <input type="text" class="form-control form-control-lg"
                        name="username" placeholder="Username" required>
                </div>

                <div class="mb-4">
                    <input type="password" class="form-control form-control-lg"
                        name="password" placeholder="Password" required>
                </div>

                <button type="submit" name="login" class="btn btn-gradient w-100">
                    Login
                </button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>