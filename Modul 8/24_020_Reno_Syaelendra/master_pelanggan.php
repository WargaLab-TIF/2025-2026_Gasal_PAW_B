<?php 
session_start();
include 'koneksi.php';
if($_SESSION['level'] != 1){ header("location:index.php"); exit; }

// --- PROSES SIMPAN ---
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    
    mysqli_query($koneksi, "INSERT INTO pelanggan (nama_pelanggan, alamat, hp) VALUES ('$nama', '$alamat', '$hp')");
    echo "<script>alert('Pelanggan Berhasil Ditambahkan!'); window.location='master_pelanggan.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Master Pelanggan</title><link rel="stylesheet" href="style.css"></head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        
        <!-- MODE FORM -->
        <?php if(isset($_GET['act']) && $_GET['act'] == 'tambah'){ ?>
            <h3>Tambah Pelanggan</h3>
            <form method="post">
                <div class="form-group"><label>Nama Pelanggan</label><input type="text" name="nama" required></div>
                <div class="form-group"><label>Alamat</label><textarea name="alamat" required></textarea></div>
                <div class="form-group"><label>No HP</label><input type="text" name="hp" required></div>
                <a href="master_pelanggan.php" class="btn-download btn-back">Kembali</a>
                <button type="submit" name="simpan" class="btn-download btn-excel">Simpan</button>
            </form>

        <!-- MODE TABEL -->
        <?php } else { ?>
            <div style="display:flex; justify-content:space-between;">
                <h2>Data Pelanggan</h2> <a href="data_master.php" class="btn-download btn-back">Kembali</a>
            </div>
            <a href="master_pelanggan.php?act=tambah" class="btn-download btn-excel" style="margin:15px 0;">+ Tambah Pelanggan</a>
            <table>
                <thead><tr><th>No</th><th>Nama Pelanggan</th><th>Alamat</th><th>No HP</th></tr></thead>
                <tbody>
                    <?php $no=1; 
                    // FIX QUERY SQL
                    $data=mysqli_query($koneksi,"SELECT * FROM pelanggan ORDER BY id_pelanggan DESC"); 
                    while($d=mysqli_fetch_array($data)){ ?>
                    <tr><td><?php echo $no++; ?></td><td><?php echo $d['nama_pelanggan']; ?></td><td><?php echo $d['alamat']; ?></td><td><?php echo $d['hp']; ?></td></tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>

    </div>
</body>
</html>