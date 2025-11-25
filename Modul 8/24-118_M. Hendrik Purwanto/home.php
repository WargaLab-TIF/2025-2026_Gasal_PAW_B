<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
        <p class="mt-2 text-gray-600">Selamat datang, <?=htmlspecialchars($_SESSION['nama'])?>. Level: <?=htmlspecialchars($_SESSION['level'])?></p>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow">Ringkasan 1</div>
            <div class="bg-white p-4 rounded shadow">Ringkasan 2</div>
            <div class="bg-white p-4 rounded shadow">Ringkasan 3</div>
        </div>
    </div>
</body>
</html>
