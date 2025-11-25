<?php 
include 'config.php';
include '../header.php'; 
include '../../auth.php';
?>

<style>
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df 0%, #224abe 100%);
    }
    .card-header-title {
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-size: 0.85rem;
        font-weight: 700;
    }
    .avatar-circle {
        width: 35px;
        height: 35px;
        background-color: #e3e6f0;
        color: #5a5c69;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.9rem;
    }
</style>

<div class="container mt-4 mb-5">

    <div class="card shadow-lg border-0 rounded-3">
        
        <div class="card-header bg-gradient-primary text-white py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 card-header-title">
                    <i class="bi bi-receipt-cutoff me-2"></i> Data Penjualan
                </h6>
            </div>
            <a href="tambah.php" class="btn btn-light btn-sm text-primary shadow-sm fw-bold">
                <i class="bi bi-plus-circle-fill me-1"></i> Transaksi Baru
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="px-4 py-3 text-uppercase small fw-bold border-0">No</th>
                            <th class="py-3 text-uppercase small fw-bold border-0">Tanggal</th>
                            <th class="py-3 text-uppercase small fw-bold border-0">Pelanggan</th>
                            <th class="py-3 text-end text-uppercase small fw-bold border-0">Total</th>
                            <th class="py-3 text-center text-uppercase small fw-bold border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT t.*, p.nama AS pelanggan 
                                                  FROM transaksi t 
                                                  JOIN pelanggan p ON p.id = t.pelanggan_id
                                                  ORDER BY t.waktu_transaksi DESC");

                        if (mysqli_num_rows($q) > 0) {
                            while ($row = mysqli_fetch_assoc($q)) {
                                $tanggal = date('d M Y', strtotime($row['waktu_transaksi']));
                                // Ambil huruf depan nama pelanggan untuk avatar
                                $inisial = strtoupper(substr($row['pelanggan'], 0, 1));
                        ?>
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td class="px-4 text-muted"><?= $no++ ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light text-primary rounded px-2 py-1 small fw-bold border">
                                        <i class="bi bi-calendar-event me-1"></i> <?= $tanggal ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle me-3">
                                        <?= $inisial ?>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block"><?= htmlspecialchars($row['pelanggan']) ?></span>
                                        <span class="small text-muted">ID: #<?= $row['id'] ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">
                                <span class="fw-bold text-success fs-6">
                                    Rp <?= number_format($row['total'], 0, ',', '.') ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-link text-secondary" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu shadow border-0">
                                        <li><a class="dropdown-item" href="detail.php?id=<?= $row['id'] ?>"><i class="bi bi-eye text-info me-2"></i> Detail</a></li>
                                        <li><a class="dropdown-item" href="edit.php?id=<?= $row['id'] ?>"><i class="bi bi-pencil text-warning me-2"></i> Edit</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')"><i class="bi bi-trash me-2"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center py-5 text-muted">Data transaksi masih kosong.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card-footer bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6 small text-muted">
                    Total Transaksi: <strong><?= mysqli_num_rows($q) ?></strong> data
                </div>
                <div class="col-md-6">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm justify-content-end mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>