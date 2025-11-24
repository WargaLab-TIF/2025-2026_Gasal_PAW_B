<?php 
session_start();
include 'koneksi.php';

// Proteksi Admin
if($_SESSION['status'] != "login" || $_SESSION['level'] != 1){ header("location:index.php"); exit; }

// --- LOGIKA 1: PROSES SIMPAN DATA (Jika tombol simpan ditekan) ---
if(isset($_POST['simpan'])){
    $nama  = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];
    
    $simpan = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, harga, stok) VALUES ('$nama', '$harga', '$stok')");
    
    if($simpan){
        echo "<script>alert('Data Berhasil Disimpan!'); window.location='master_barang.php';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Master Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">

        <!-- LOGIKA 2: TAMPILAN FORMULIR (Jika URL ?act=tambah) -->
        <?php if(isset($_GET['act']) && $_GET['act'] == 'tambah'){ ?>
            
            <h3>Tambah Barang Baru</h3>
            <form method="post">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" required>
                </div>
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" required>
                </div>
                <div class="form-group">
                    <label>Stok Awal</label>
                    <input type="number" name="stok" required>
                </div>
                <div style="margin-top:20px;">
                    <!-- Tombol Kembali ke Tabel -->
                    <a href="master_barang.php" class="btn-download btn-back">Kembali</a>
                    <button type="submit" name="simpan" class="btn-download btn-excel">Simpan Data</button>
                </div>
            </form>

        <!-- LOGIKA 3: TAMPILAN TABEL DATA (Default) -->
        <?php } else { ?>

            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h2>Data Barang</h2>
                <a href="data_master.php" class="btn-download btn-back" style="font-size:12px;">Kembali ke Menu</a>
            </div>
            <hr>
            
            <!-- Link ini memanggil file yang sama tapi dengan ?act=tambah -->
            <a href="master_barang.php?act=tambah" class="btn-download btn-excel" style="margin-bottom:15px; text-decoration:none;">+ Tambah Barang</a>
            
            <table>
                <thead>
                    <tr><th>No</th><th>Nama Barang</th><th>Harga</th><th>Stok</th></tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1; 
                    $data=mysqli_query($koneksi,"SELECT * FROM barang ORDER BY id_barang DESC");
                    while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td>Rp <?php echo number_format($d['harga']); ?></td>
                        <td align="center"><?php echo $d['stok']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } ?>
    </div>
</body>
</html>