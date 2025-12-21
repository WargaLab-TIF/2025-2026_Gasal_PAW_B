<?php
session_start();

// 1. Cek Login
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

// 2. Cek Level (Gunakan == agar aman type juggling)
if ($_SESSION['level'] != 1) {
    // Jika bukan admin (bukan 1), lempar balik ke home
    header("Location: home.php");
    exit;
}

include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Data Master</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Data Master</h2>
                <p class="mt-1 text-gray-600 text-sm">Halaman manajemen data referensi sistem.</p>
            </div>
            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded border border-yellow-400">Admin Only</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition cursor-pointer border-l-4 border-sky-500">
                <h3 class="font-bold text-gray-700">Data Barang</h3>
                <p class="text-gray-500 text-sm mt-2">Kelola stok dan harga barang.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition cursor-pointer border-l-4 border-green-500">
                <h3 class="font-bold text-gray-700">Data Kategori</h3>
                <p class="text-gray-500 text-sm mt-2">Pengelompokan jenis produk.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition cursor-pointer border-l-4 border-orange-500">
                <h3 class="font-bold text-gray-700">Data Supplier</h3>
                <p class="text-gray-500 text-sm mt-2">Daftar pemasok barang.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition cursor-pointer border-l-4 border-purple-500">
                <h3 class="font-bold text-gray-700">Data User</h3>
                <p class="text-gray-500 text-sm mt-2">Manajemen pengguna aplikasi.</p>
            </div>
        </div>
    </div>
</body>
</html>