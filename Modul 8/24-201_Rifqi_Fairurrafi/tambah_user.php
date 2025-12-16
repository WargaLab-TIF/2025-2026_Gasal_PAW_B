<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $level = $_POST['level'];

    if ($username != '' && $nama != '' && $level != '-1') {

        $query = "INSERT INTO user (username, password, nama, alamat, hp, level) 
                  VALUES ('$username', '$password', '$nama', '$alamat', '$hp', '$level')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    window.location.href = 'data_user.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menambahkan data!');
                  </script>";
        }

    } else {
        echo "<script>alert('Harap isi data yang diperlukan!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <p class="text-primary fs-3 m-0">Tambah User Baru</p>
        <hr>
        <form action="" method="post">

            <div class="row py-2">
                <div class="col-md-2 d-flex justify-content-end p-0">
                    <label for="username" class="fw-semibold">Username</label>
                </div>
                <div class="col-md-10 d-flex justify-content-start ">
                    <input type="text" name="username" class="form-control w-25">
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col-md-2 d-flex justify-content-end p-0">
                    <label for="password" class="fw-semibold">Password</label>
                </div>
                <div class="col-md-10 d-flex justify-content-start ">
                    <input type="password" name="password" class="form-control w-25">
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col-md-2 d-flex justify-content-end p-0">
                    <label for="nama" class="fw-semibold">Nama User</label>
                </div>
                <div class="col-md-10 d-flex justify-content-start ">
                    <input type="text" name="nama" class="form-control" style="width: 300px;">
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col-md-2 d-flex justify-content-end p-0">
                    <label for="alamat" class="fw-semibold">Alamat</label>
                </div>
                <div class="col-md-10 d-flex justify-content-start ">
                    <textarea name="alamat" class="form-control form-control-lg w-50"></textarea>
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col-md-2 d-flex justify-content-end p-0">
                    <label for="hp" class="fw-semibold">No HP</label>
                </div>
                <div class="col-md-10 d-flex justify-content-start ">
                    <input type="text" name="hp" class="form-control w-25">
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col-md-2 d-flex justify-content-end p-0">
                    <label for="level" class="fw-semibold">Jenis User</label>
                </div>
                <div class="col-md-10 d-flex justify-content-start ">
                    <select name="level" class="form-select w-25">
                        <option value="-1">--- Pilih User ---</option>
                        <option value="1">Admin</option>
                        <option value="2">User Biasa</option>
                    </select>
                </div>
            </div>
            
            <div class="row py-2">
                <div class="col-md-2 d-flex justify-content-end p-0"></div>
                <div class="col-md-10 d-flex justify-content-start ">
                    <button type="submit" class="btn btn-green-gradient px-3 py-2">Simpan</button>
                    <button type="button" onclick="window.location.href='data_user.php'" class="btn btn-red-gradient px-3 py-2 mx-1">Batal</button>
                </div>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>