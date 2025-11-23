<?php 
include 'proteksi.php'; // Cek login
include 'koneksi.php';  // Koneksi database
include 'menu.php';     // Tampilkan menu

// Hanya level 1 (admin) yang boleh tambah user
if ($_SESSION['level'] != 1) { 
    header('Location: home.php'); 
    exit; 
}
?>
<h2>Tambah User</h2>
<a href="user.php">Kembali</a>
<br><br>

<form action="user_tambah_proses.php" method="post">
    <!-- Input username -->
    Username : <br>
    <input type="text" name="username" required><br><br>

    <!-- Input password -->
    Password : <br>
    <input type="password" name="password" required><br><br>

    <!-- Input nama -->
    Nama : <br>
    <input type="text" name="nama" required><br><br>

    <!-- Input alamat -->
    Alamat : <br>
    <textarea name="alamat" required></textarea><br><br>

    <!-- Input nomor HP -->
    HP : <br>
    <input type="text" name="hp" required><br><br>

    <!-- Pilih level -->
    Level : <br>
    <select name="level" required>
        <option value="1">1 (Admin)</option>
        <option value="2">2 (User)</option>
    </select>
    <br><br>

    <button type="submit">Simpan</button>
</form>
