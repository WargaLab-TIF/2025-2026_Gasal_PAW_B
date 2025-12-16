<?php
session_start();

require_once '../includes/hubung.php';
require_once '../includes/fungsi.php';

$errors = [];

if(isset($_POST['simpan'])){
    $nonota = bersihkan($_POST['nonota']);
    $tanggal = bersihkan($_POST['tanggal']);
    $idsupplier = bersihkan($_POST['idsupplier']);
    $total = bersihkan($_POST['total']);
    $keterangan = bersihkan($_POST['keterangan']);

    if ($idsupplier === "") {
        $errors[] = "Supplier ID harus terisi";
    } else {
        $supplier = mysqli_query($conn, "SELECT * FROM supplier WHERE id = '$idsupplier'");
        if (!$supplier) {
            $errors[] = "Query supplier gagal: " . mysqli_error($conn);
        } else {
            $data_supplier = mysqli_fetch_assoc($supplier);
            if (!$data_supplier) {
                $errors[] = "Supplier ID tidak sesuai";
            }
        }
    }

    $errors = array_merge($errors, array_filter([
        validasinonota($nonota),
        validasitanggal($tanggal),
        validasitotal($total),
        validasiketerangan($keterangan)
    ]));

    if(empty($errors)){
        $query = "INSERT INTO transaksi_penjualan(no_nota, tanggal, supplier_id, total, keterangan) 
        VALUES ('$nonota','$tanggal','$idsupplier','$total','$keterangan')";
        $hasil = mysqli_query($conn, $query); 

        if($hasil){
            $id_transaksi = mysqli_insert_id($conn);

            $query_ambil_data = "SELECT * FROM barang WHERE supplier_id = '$idsupplier'"; 
            $ambil_data = mysqli_query($conn, $query_ambil_data);
            if ($ambil_data && mysqli_num_rows($ambil_data) > 0) {
                while($hasil_ambil_data = mysqli_fetch_assoc($ambil_data)){
                    $bi = $hasil_ambil_data['id'];
                    $harga = $hasil_ambil_data['harga'];
                    $qty = 1;
                    $subtotal = $harga * $qty;

                    $masukkan_data = "INSERT INTO transaksi_penjualan_detail(transaksi_penjualan_id, barang_id, harga, qty, subtotal) 
                    VALUES ('$id_transaksi','$bi','$harga','$qty','$subtotal')";
                    $hasil2 = mysqli_query($conn, $masukkan_data);
                }
            }
            $_SESSION['sukses'] = "Data Berhasil Dimasukkan";
            header('Location: transaksipenjualan.php');
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
    <title>Tambah Data Transaksi Penjualan(Nota)</title>
    <link rel="stylesheet" href="../aset/style.css">
</head>
<body>

    <?php include '../aset/header.php' ?>

    <div class="judul">
        <h2>Tambah Data Transaksi Penjualan(Nota) Baru</h2>
    </div>


    <div class="inputan">
        <div class="input-supplier">
            <h3>Transaksi Penjualan(Nota)</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="nonota">Nomor Nota: 
                    <input type="text" name="nonota" placeholder="Nomor Nota">
                </label>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal: 
                    <input type="date" name="tanggal" placeholder="tanggal">
                </label>
            </div>
            <div class="form-group">
                <label for="idsupplier">Supplier ID:
                    <select name="idsupplier">
                        <option value="">Pilih Suplier</option>
                        <?php 
                        $supplier = mysqli_query($conn, 'SELECT * FROM supplier');

                        if(mysqli_num_rows($supplier)>0):
                            while($rows = mysqli_fetch_assoc($supplier)):?>
                        <option value="<?= $rows['id'] ?>"><?= $rows['nama'] ?></option>
                        <?php
                        endwhile;
                    endif;?>
                    </select>
                </label>
            </div>
            <div class="form-group">
                <label for="total">Total: 
                    <input type="text" name="total" placeholder="Total">
                </label>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan: 
                    <input type="text" name="keterangan" placeholder="keterangan">
                </label>
            </div>
            <?php if (!empty($errors)): ?>
            <div class="inputan">
                <ul class="errors">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <div class="tombol">
                <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
                <button type="button" class="btn btn-batal" onclick="window.location.href='transaksipenjualan.php'">Batal</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>