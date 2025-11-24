<?php
session_start();

if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=Anda belum login!");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User Baru</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { width: 500px; border: 1px solid #ddd; padding: 20px; border-radius: 5px; box-shadow: 2px 2px 10px #eee; }
        h3 { margin-top: 0; }
        
        label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 14px; }
        input[type="text"], input[type="password"], textarea, select {
            width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        
        .btn-simpan { background-color: #6bb934; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn-batal { background-color: #d32f2f; color: white; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-size: 13.3px; }
        
    </style>
</head>
<body>

<div class="container">
    <h3>Tambah User Baru</h3>
    <hr>
    
    <form action="proses_tambah.php" method="POST">
        
        <label>Username</label>
        <input type="text" name="username" value="budi" placeholder="Username" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required>

        <label>Nama User</label>
        <input type="text" name="nama" placeholder="Nama User" required>

        <label>Alamat</label>
        <textarea name="alamat" rows="3" placeholder="Alamat Lengkap"></textarea>

        <label>Nomor HP</label>
        <input type="text" name="hp" placeholder="Nomor HP">

        <label>Jenis User</label>
        <select name="level" required>
            <option value="">Pilih Jenis User</option>
            <option value="1">Admin</option>
            <option value="2">User Biasa</option>
        </select>

        <br>
        
        <input type="submit" class="btn-simpan" value="Simpan">
        <a href="admin.php" class="btn-batal">Batal</a>

    </form>
</div>

</body>
</html>