<?php 
include 'config.php';
include '../header.php';
include '../../auth.php';

// --- Ambil Data Supplier untuk Dropdown ---
// Kita perlu ini agar user bisa memilih Nama Supplier, bukan mengetik ID manual
$query_supplier = mysqli_query($conn, "SELECT id, nama FROM supplier ORDER BY nama ASC");

if(isset($_POST['submit'])){
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $supplier = $_POST['supplier_id'];

    // Insert data
    $insert = mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) 
                                   VALUES('$kode', '$nama', '$harga', '$stok', '$supplier')");

    if($insert){
        // Redirect dengan alert javascript agar user tahu berhasil
        echo "<script>alert('Data barang berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .card-form { max-width: 600px; margin: 50px auto; border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .card-header { background: #4e73df; color: white; border-radius: 15px 15px 0 0 !important; padding: 20px; }
        .form-label { font-weight: 600; color: #555; }
    </style>
</head>
<body>

<div class="container">
    <div class="card card-form">
        <div class="card-header text-center">
            <h4 class="mb-0">Form Tambah Barang</h4>
        </div>
        <div class="card-body p-4">
            
            <form action="" method="POST">
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" placeholder="Cth: BRG001" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Cth: Sabun Cuci" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Harga Jual</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga" class="form-control" placeholder="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stok Awal</label>
                        <input type="number" name="stok" class="form-control" placeholder="0" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Supplier</label>
                    <select name="supplier_id" class="form-select" required>
                        <option value="">-- Pilih Supplier --</option>
                        <?php while($s = mysqli_fetch_assoc($query_supplier)): ?>
                            <option value="<?= $s['id'] ?>">
                                <?= $s['nama'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <div class="form-text">Pilih penyedia barang dari daftar yang ada.</div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="index.php" class="btn btn-secondary me-md-2">Batal</a>
                    <button type="submit" name="submit" class="btn btn-primary px-4">Simpan Barang</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>