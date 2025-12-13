<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Logout</title>
<meta http-equiv="refresh" content="3; url=/pages/login/">
<style>
body {font-family: Arial; text-align:center; padding:60px; background:#f8f9fa;}
.kotak {display:inline-block; background:#fff; border:1px solid #ddd; padding:30px 40px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,.1);}
</style>
</head>
<body>
<div class="kotak">
    <h3>Anda telah logout</h3>
    <p>Mengalihkan ke halaman login...</p>
    <p><a href="/pages/login/">Klik di sini jika tidak otomatis</a></p>
</div>
<script>
setTimeout(function(){ location.href='/pages/login/'; },3000);
</script>
</body>
</html>