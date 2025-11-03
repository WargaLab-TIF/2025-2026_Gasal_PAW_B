<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="header-container" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h2 style="color: #000000ff; font-weight: bold;">Data Master Supplier</h2>
        
        <a href="tugas-2.php" class="btn btn-success">Tambah Data</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark"> 
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $no = 1;
                $sql = "SELECT * FROM supplier ORDER BY id ASC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                    <td><?php echo htmlspecialchars($row["telp"]); ?></td>
                    <td><?php echo htmlspecialchars($row["alamat"]); ?></td>
                    <td>
                        <a href="tugas-3.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning btn-sm">Edit</a>
                        
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $row['id']; ?>">
                            Hapus
                        </button>

                        <div class="modal fade" id="modalHapus<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Hapus supplier : <strong><?php echo htmlspecialchars($row["nama"]); ?></strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <a href="tugas-4.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>