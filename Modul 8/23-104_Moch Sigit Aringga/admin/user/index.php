<?php 
include 'config.php';
include '../header.php'; 
include '../../auth.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f8f9fa; }
        .avatar-initial {
            width: 35px; height: 35px;
            background-color: #e9ecef; color: #495057;
            border-radius: 50%; display: inline-flex;
            align-items: center; justify-content: center;
            font-weight: bold; margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4 mb-5">
    
    <div class="card shadow-sm border-0">
        
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-primary">
                <i class="bi bi-people-fill me-2"></i> Data Pengguna
            </h5>
            <a href="tambah.php" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Tambah User Baru
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3" width="5%">No</th>
                            <th class="py-3">User Info</th>
                            <th class="py-3">Kontak</th>
                            <th class="py-3">Level Akses</th>
                            <th class="py-3 text-end px-4" width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $result = mysqli_query($conn, "SELECT * FROM user ORDER BY level ASC");
                        
                        // Cek jika data ada
                        if(mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Logika Badge Level
                                if($row['level'] == 1){
                                    $badge = '<span class="badge bg-primary bg-opacity-10 text-primary border border-primary">Admin</span>';
                                } elseif ($row['level'] == 2) {
                                    $badge = '<span class="badge bg-success bg-opacity-10 text-success border border-success">Kasir</span>';
                                } else {
                                    // Asumsi level 3 atau lainnya adalah Gudang/Operator
                                    $badge = '<span class="badge bg-warning bg-opacity-10 text-warning border border-warning">Gudang</span>';
                                }
                        ?>
                        <tr>
                            <td class="px-4 text-muted"><?= $no++; ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-initial">
                                        <?= strtoupper(substr($row['username'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark"><?= htmlspecialchars($row['nama']) ?></div>
                                        <div class="small text-muted">@<?= htmlspecialchars($row['username']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="small"><i class="bi bi-telephone me-1"></i> <?= htmlspecialchars($row['hp']) ?></span>
                                    <span class="small text-muted text-truncate" style="max-width: 150px;">
                                        <i class="bi bi-geo-alt me-1"></i> <?= htmlspecialchars($row['alamat']) ?>
                                    </span>
                                </div>
                            </td>
                            <td><?= $badge ?></td>
                            <td class="text-end px-4">
                                <a href="edit.php?id=<?= $row['id_user']; ?>" class="btn btn-light btn-sm text-primary" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="hapus.php?id=<?= $row['id_user']; ?>" 
                                   onclick="return confirm('Yakin ingin menghapus user <?= $row['username'] ?>?')" 
                                   class="btn btn-light btn-sm text-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } else {
                            echo '<tr><td colspan="5" class="text-center py-4 text-muted">Belum ada data user.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white small text-muted">
            Total User: <strong><?= mysqli_num_rows($result) ?></strong>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>