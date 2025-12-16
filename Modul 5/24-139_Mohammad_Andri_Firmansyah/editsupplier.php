<?php
session_start();

require_once 'includes/hubung.php';
require 'includes/fungsi.php';

if (!isset($_GET['id'])) {
    header('Location: supplier.php');
    exit;
}

$id = (int) $_GET['id'];

$hasil = mysqli_query($conn, "SELECT * FROM supplier WHERE id = $id");
$supplier = mysqli_fetch_assoc($hasil);


if (!$supplier) {
    echo "Data supplier tidak ditemukan!";
    exit;
}

$errors = [];

if (isset($_POST['update'])) {
    $nama   = bersihkan($_POST['nama']);
    $telp   = bersihkan($_POST['telp']);
    $alamat = bersihkan($_POST['alamat']);

    $errors = array_filter([
        validasiNama($nama),
        validasitelp($telp),
        validasialamat($alamat)
    ]);
    if (empty($errors)) {
        $query = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";
        $update = mysqli_query($conn, $query);

        if ($update) {
            $_SESSION['sukses'] = "Data supplier berhasil diperbarui!";
            header('Location: supplier.php');
            exit;
        } else {
            $_SESSION['error'] = "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="aset/style.css">
</head>
<body>

    <?php include 'aset/header.php' ?>

    <div class="judul">
        <h2>Edit Data Master Supplier</h2>
    </div>

    <?php

    if (isset($_SESSION['error'])) {
        echo "<div class='error'>{$_SESSION['error']}</div>";
        unset($_SESSION['error']);
    }
    ?>

    <div class="inputan">
        <form action="" method="post">
            <div class="nama">
                <label for="nama">Nama: 
                    <input type="text" name="nama" value="<?= htmlspecialchars($_POST['nama'] ?? $supplier['nama']); ?>">
                </label>
            </div>
            <div class="telp">
                <label for="telp">Telp: 
                    <input type="text" name="telp" value="<?= htmlspecialchars($_POST['telp'] ?? $supplier['telp']); ?>">
                </label>
            </div>
            <div class="alamat">
                <label for="alamat">Alamat: 
                    <input type="text" name="alamat" value="<?= htmlspecialchars($_POST['alamat'] ?? $supplier['alamat']); ?>">
                </label>
            </div>
            <?php if (!empty($errors)): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="tombol">
                <button type="submit" name="update" class="btn btn-update">Update</button>
                <button type="button" class="btn btn-batal" onclick="window.location.href='supplier.php'">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>