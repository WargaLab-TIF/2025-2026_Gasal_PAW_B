<?php include 'proteksi.php'; include 'koneksi.php'; include 'menu.php'; ?>
<!-- Tampilkan nama user yang login -->
<h2>Selamat Datang, <?= htmlspecialchars($_SESSION['nama']); ?></h2>

<!-- Tampilkan level akses user -->
<p>Level akses Anda: <?= htmlspecialchars($_SESSION['level']); ?></p>
