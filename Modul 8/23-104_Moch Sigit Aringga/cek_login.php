<?php 
// cek_login.php
session_start();
include 'config.php'; // Sesuaikan lokasi config.php kamu

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']); // Gunakan md5 sesuai database kamu sebelumnya

// menyeleksi data user dengan username dan password yang sesuai
$data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $row = mysqli_fetch_assoc($data);

    // MENYIMPAN DATA KE SESSION (PENTING!)
    $_SESSION['username'] = $username;
    $_SESSION['nama']     = $row['nama'];
    $_SESSION['level']    = $row['level'];
    $_SESSION['status']   = "login"; // Ini kuncinya

    // Cek Level untuk Redirect (Opsional)
    if($row['level'] == "1"){
        header("location:admin/index.php"); // Arahkan ke folder admin
    } else {
        header("location:kasir/index.php"); // Arahkan ke folder kasir
    }

} else {
    // Jika gagal
    header("location:login.php?pesan=gagal");
}
?>