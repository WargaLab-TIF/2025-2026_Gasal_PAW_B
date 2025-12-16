<?php
// ambil koneksi database & helper
require __DIR__ . '/koneksi.php';
// pindah ke halaman utama supplier
header('Location: ' . base_url() . 'supplier.php');
exit;
?>