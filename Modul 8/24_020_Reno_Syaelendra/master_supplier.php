<?php 
session_start();
include 'koneksi.php';
if($_SESSION['level'] != 1){ header("location:index.php"); exit; }

// --- PROSES SIMPAN ---
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    
    mysqli_query($koneksi, "INSERT INTO supplier (nama_supplier, alamat, telepon) VALUES ('$nama', '$alamat', '$telp')");
    echo "<script>alert('Supplier Berhasil Ditambahkan!'); window.location='master_supplier.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Master Supplier</title><link rel="stylesheet" href="style.css"></head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        
        <!-- MODE FORM -->
        <?php if(isset($_GET['act']) && $_GET['act'] == 'tambah'){ ?>
            <h3>Tambah Supplier</h3>
            <form method="post">
                <div class="form-group"><label>Nama Supplier</label><input type="text" name="nama" required></div>
                <div class="form-group"><label>Alamat</label><textarea name="alamat" required></textarea></div>
                <div class="form-group"><label>Telepon</label><input type="text" name="telp" required></div>
                <a href="master_supplier.php" class="btn-download btn-back">Kembali</a>
                <button type="submit" name="simpan" class="btn-download btn-excel">Simpan</button>
            </form>

        <!-- MODE TABEL -->
        <?php } else { ?>
            <div style="display:flex; justify-content:space-between;">
                <h2>Data Supplier</h2> <a href="data_master.php" class="btn-download btn-back">Kembali</a>
            </div>
            <a href="master_supplier.php?act=tambah" class="btn-download btn-excel" style="margin:15px 0;">+ Tambah Supplier</a>
            <table>
                <thead><tr><th>No</th><th>Nama Supplier</th><th>Alamat</th><th>Telepon</th></tr></thead>
                <tbody>
                    <?php $no=1; 
                    // FIX QUERY SQL
                    $data=mysqli_query($koneksi,"SELECT * FROM supplier ORDER BY id_supplier DESC"); 
                    while($d=mysqli_fetch_array($data)){ ?>
                    <tr><td><?php echo $no++; ?></td><td><?php echo $d['nama_supplier']; ?></td><td><?php echo $d['alamat']; ?></td><td><?php echo $d['telepon']; ?></td></tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>

    </div>
</body>
</html>