<?php
session_start();
include 'koneksi.php';

$debug = "";
$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass     = $_POST['password'];

    $debug .= "Username Input: " . htmlspecialchars($username) . "<br>";

    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $debug .= "SQL Query: $sql<br>";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $debug .= "<b>Query Error:</b> " . mysqli_error($conn) . "<br>";
    }

    $data = mysqli_fetch_assoc($result);

    if ($data) {

        if (password_verify($pass, $data['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['nama']  = $data['nama'];
            $_SESSION['level'] = (int)$data['level'];

            header("Location: home.php");
            exit;

        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">

    <h1 class="text-2xl font-bold text-sky-700">Login Admin</h1>

    <?php if (!empty($error)) : ?>
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="mt-6 space-y-4">
        <div>
            <label class="text-sm font-semibold">Username</label>
            <input type="text" name="username" required class="w-full border px-3 py-2 rounded mt-1 focus:ring-2 focus:ring-sky-500">
        </div>

        <div>
            <label class="text-sm font-semibold">Password</label>
            <input type="password" name="password" required class="w-full border px-3 py-2 rounded mt-1 focus:ring-2 focus:ring-sky-500">
        </div>

        <button type="submit" name="login" class="w-full bg-sky-600 text-white py-2 rounded hover:bg-sky-700 transition">
            Login
        </button>
    </form>

</div>

</body>
</html>
