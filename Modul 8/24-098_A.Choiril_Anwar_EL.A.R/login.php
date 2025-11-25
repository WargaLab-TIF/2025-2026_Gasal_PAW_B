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
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center min-h-screen px-4">
    <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-8">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-bold text-blue-600">Login Sistem</h3>
            <p class="text-gray-500 text-sm">Silakan masuk untuk melanjutkan</p>
        </div>

        <?php if (isset($error)) : ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <?= $error; ?>
                <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                    ✕
                </button>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label for="username" class="block font-medium text-gray-600 mb-1">Username</label>
                <input type="text" id="username" name="username" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mb-6">
                <label for="password" class="block font-medium text-gray-600 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit" name="login"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                LOGIN
            </button>
        </form>
    </div>
</div>

</body>
</html>
