<?php
// Koneksi database (sederhana)
$servername="localhost"; $username="root"; $password=""; $dbname="penjualan_tp5";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("Koneksi Error: ".mysqli_connect_error());}
mysqli_set_charset($conn,'utf8mb4');

// Mulai session (dibutuhkan untuk flash message)
if(session_status()===PHP_SESSION_NONE){session_start();}

/**
 * base_url
 * Menghasilkan URL dasar aplikasi (skema + host + direktori) untuk pembuatan link dinamis.
 * Menghindari hardcode path ketika dipindah server / folder.
 */
if(!function_exists('base_url')){
  function base_url(): string{
    $skema=!empty($_SERVER['HTTPS'])?'https':'http';
    $host=$_SERVER['HTTP_HOST']??'localhost';
    $direktori=rtrim(dirname($_SERVER['SCRIPT_NAME']??'/'),'/\\');
    return $skema.'://'.$host.($direktori?$direktori.'/':'/');
  }
}

/**
 * flash
 * Menyimpan / mengambil pesan singkat ke session.
 * Pemanggilan flash('kunci','Pesan') untuk set.
 * Pemanggilan flash('kunci') untuk get (otomatis hapus setelah dibaca).
 */
if(!function_exists('flash')){
  function flash(string $kunci, ?string $pesan=null): ?string{
    if($pesan!==null){$_SESSION['flash'][$kunci]=$pesan; return null;}
    if(!empty($_SESSION['flash'][$kunci])){$m=$_SESSION['flash'][$kunci]; unset($_SESSION['flash'][$kunci]); return $m;}
    return null;
  }
}
