<?php
$conn = new mysqli("localhost", "root", "", "db_toko");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_nota = $_POST['no_nota'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    $barang = $_POST['barang'] ?? [];
    $harga = $_POST['harga'] ?? [];
    $jumlah = $_POST['jumlah'] ?? [];
    $subtotal = $_POST['subtotal'] ?? [];

    // Simpan master transaksi
    $sqlMaster = "INSERT INTO transaksi_master (no_nota, nama, tanggal, total)
                  VALUES ('$no_nota', '$nama', '$tanggal', '$total')";
    $conn->query($sqlMaster);

    // Simpan detail
    for ($i = 0; $i < count($barang); $i++) {
        $b = $barang[$i];
        $h = $harga[$i];
        $j = $jumlah[$i];
        $s = $subtotal[$i];
        $sqlDetail = "INSERT INTO transaksi_detail (no_nota, barang, harga, jumlah, subtotal)
                      VALUES ('$no_nota', '$b', '$h', '$j', '$s')";
        $conn->query($sqlDetail);
    }

    header("Location: tampil_transaksi.php?no_nota=$no_nota");
    exit();
}
?>
