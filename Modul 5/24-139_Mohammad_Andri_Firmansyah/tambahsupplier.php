<?php
session_start();

require_once 'includes/hubung.php';
require 'includes/fungsi.php';

$errors = [];

if(isset($_POST['simpan'])){
    $nama = bersihkan($_POST['nama']);
    $telp = bersihkan($_POST['telp']);
    $alamat = bersihkan($_POST['alamat']);

    $errors = array_filter([
        validasiNama($nama),
        validasitelp($telp),
        validasialamat($alamat)
    ]);

    if(empty($errors)){
        $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        $hasil = mysqli_query($conn, $query);

        if($hasil){
            $_SESSION['sukses'] = "Data Berhasil Dimasukkan";
            header('Location: supplier.php');
            exit;
        } else{
            $errors[] = "Gagal menyimpan data ke database: " . mysqli_error($conn); 
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="aset/style.css">
</head>
<body>

    <?php include 'aset/header.php' ?>

    <div class="judul">
        <h2>Tambah Data Master Supplier Baru</h2>
    </div>

    <div class="inputan">
        <form action="" method="post">
            <div class="nama">
                <label for="nama">Nama: 
                    <input type="text" name="nama" placeholder="Nama">
                </label>
            </div>
            <div class="telp">
                <label for="telp">Telp: 
                    <input type="text" name="telp" placeholder="telp">
                </label>
            </div>
            <div class="alamat">
                <label for="alamat">Alamat: 
                    <input type="text" name="alamat" placeholder="alamat">
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
                <button type="submit" name="simpan" class="btn btn-simpan" >Simpan</button>
                <button type="button" class="btn btn-batal" onclick="window.location.href='supplier.php'">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>