<?php
include '../../koneksi.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT username, password, nama, level FROM users WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            if (md5($password) === $row['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = $row['level'];
                $_SESSION['nama'] = $row['nama'];
                echo $row['nama'];
                header('Location: ../home');
                exit();
            }
        }

        echo "<script>alert('Login gagal! Periksa username dan password Anda.');</script>";
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Terjadi kesalahan pada server.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="card shadow" style="width:100%; max-width:420px;">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">Login User</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>