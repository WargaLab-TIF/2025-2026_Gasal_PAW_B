<?php
// Cek apakah user sudah login
function cekLogin()
{
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }
}

// Cek apakah level user sesuai
function cekLevel($level)
{
    if ($_SESSION['user']['level'] != $level) {
        header("Location: ../index.php");
        exit;
    }
}
?>
