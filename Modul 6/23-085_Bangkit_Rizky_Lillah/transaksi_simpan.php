<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomor = $_POST['nomor'];
    $tanggal = $_POST['tanggal'];
    $nama_pembeli = $_POST['nama_pembeli'];
    $barang = $_POST['barang'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];

    if (empty($nama_pembeli) || count($barang) == 0) {
        echo "<script>alert('Data belum lengkap!'); window.location='transaksi_form.php';</script>";
        exit;
    }

    $total = 0;
    for ($i = 0; $i < count($barang); $i++) {
        $subtotal = $qty[$i] * $harga[$i];
        $total += $subtotal;
    }

    $sql_master = "INSERT INTO nota (nomor, nama_pembeli, tanggal, total)
                   VALUES ('$nomor', '$nama_pembeli', '$tanggal', '$total')";
    $result_master = mysqli_query($conn, $sql_master);

    if (!$result_master) {
        die("Gagal menyimpan data nota: " . mysqli_error($conn));
    }

    $nota_id = mysqli_insert_id($conn);

    for ($i = 0; $i < count($barang); $i++) {
        $nm_barang = mysqli_real_escape_string($conn, $barang[$i]);
        $jumlah = (int)$qty[$i];
        $hrg = (int)$harga[$i];
        $subtotal = $jumlah * $hrg;

        $sql_detail = "INSERT INTO nota_items (nota_id, nama_barang, qty, harga, subtotal)
                       VALUES ('$nota_id', '$nm_barang', '$jumlah', '$hrg', '$subtotal')";
        mysqli_query($conn, $sql_detail);
    }

    echo "<script>
            alert('Transaksi berhasil disimpan!');
            window.location='transaksi_list.php';
          </script>";
}
?>
