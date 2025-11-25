<?php 
include 'config.php';
include '../../auth.php';
include '../header.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Barang</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { background-color: #f4f6f9; }
        .card { border: none; border-radius: 10px; box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15); }
        .card-header { background-color: #fff; border-bottom: 1px solid #e3e6f0; padding: 1.5rem; border-radius: 10px 10px 0 0 !important; }
        .table th { font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.5px; color: #8898aa; }
        .btn-action { width: 32px; height: 32px; padding: 0; display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; }
        .kode-barang { background: #eef2f7; color: #3a3b45; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 0.9em; }
    </style>
</head>

<body>

<div class="container">
    <div class="card">
        
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 fw-bold text-primary"><i class="bi bi-box-seam me-2"></i>Data Stok Barang</h4>
                <small class="text-muted">Kelola inventaris produk Anda di sini.</small>
            </div>
            <a href="tambah.php" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Barang
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">Barang</th>
                            <th class="py-3">Supplier</th>
                            <th class="py-3 text-end">Harga (Rp)</th>
                            <th class="py-3 text-center">Stok</th>
                            <th class="py-3 text-center" width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Query JOIN: Mengambil nama supplier berdasarkan ID
                        $query = "SELECT barang.*, supplier.nama AS nama_supplier 
                                  FROM barang 
                                  LEFT JOIN supplier ON barang.supplier_id = supplier.id 
                                  ORDER BY barang.id DESC";
                        
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                
                                // Logika Warna Stok
                                if ($row['stok'] <= 20) {
                                    $stok_badge = '<span class="badge bg-danger rounded-pill">'.$row['stok'].'</span>';
                                } else {
                                    $stok_badge = '<span class="badge bg-success bg-opacity-10 text-success border border-success rounded-pill px-3">'.$row['stok'].'</span>';
                                }

                                // Handle jika supplier dihapus/null
                                $supplier_name = $row['nama_supplier'] ? $row['nama_supplier'] : '<span class="text-muted fst-italic">Tidak diketahui</span>';
                        ?>
                        <tr>
                            <td class="px-4">
                                <div class="d-flex flex-column">
                                    <span class="fw-bold text-dark"><?= $row['nama_barang']; ?></span>
                                    <small class="mt-1"><span class="kode-barang"><?= $row['kode_barang']; ?></span></small>
                                </div>
                            </td>
                            <td>
                                <i class="bi bi-building text-muted me-1"></i> <?= $supplier_name; ?>
                            </td>
                            <td class="text-end fw-bold text-secondary">
                                <?= number_format($row['harga'], 0, ',', '.'); ?>
                            </td>
                            <td class="text-center">
                                <?= $stok_badge; ?>
                            </td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-light text-primary btn-action shadow-sm me-1" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus barang <?= $row['nama_barang'] ?>?')" class="btn btn-light text-danger btn-action shadow-sm" title="Hapus">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center py-5 text-muted">Belum ada data barang. Silakan tambah data baru.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card-footer bg-white text-end text-muted small py-3">
            Total Produk: <strong><?= mysqli_num_rows($result) ?></strong>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>