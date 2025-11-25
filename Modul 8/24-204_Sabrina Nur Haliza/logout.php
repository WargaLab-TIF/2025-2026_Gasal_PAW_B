<?php
// Memulai session
session_start();

// Menghapus semua data session yang tersimpan
session_unset();

// Menghancurkan session agar user tidak tetap login
session_destroy();

// Redirect kembali ke halaman login
header("location: login.php");
exit;  // Menghentikan script lebih lanjut setelah redirect
