<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "penjualan_tp5"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    echo "Koneksi Berhasil";
} else {
    if (!$conn) {
        die("Koneksi Error: " . mysqli_connect_error());
    }
}

// atur charset 
mysqli_set_charset($conn, 'utf8mb4');

// Helper base URL (sederhana)
if (!function_exists('base_url')) {
    function base_url(): string {
        $scheme = !empty($_SERVER['HTTPS']) ? 'https' : 'http';
        $host   = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $dir    = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? '/'), '/\\');
        return $scheme . '://' . $host . ($dir ? $dir.'/' : '/');
    }
}

// session dimulai satu kali
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// function sederhana untuk flash message
if (!function_exists('flash')) {
    function flash(string $key, ?string $msg = null): ?string {
        // simpan pesan ke session
        if ($msg !== null) {
            $_SESSION['flash'][$key] = $msg;
            return null;
        }
        // ambil lalu hapus pesan dari session
        if (!empty($_SESSION['flash'][$key])) {
            $m = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $m;
        }
        return null;
    }
}
