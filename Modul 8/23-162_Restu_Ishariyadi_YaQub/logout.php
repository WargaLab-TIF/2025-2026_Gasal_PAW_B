<?php
// Sesuai Slide 45
session_start();      // 1. Mulai session
session_unset();      // 2. Kosongkan variabel session
session_destroy();    // 3. Hancurkan session

// Kembalikan ke halaman login
header("Location: login.php");
exit;
?>