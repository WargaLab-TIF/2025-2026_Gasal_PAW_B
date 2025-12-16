<?php

require_once "koneksi.php";

$sql = "SELECT * FROM `supplier`";
$result = mysqli_query($conn, $sql);

$data = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    $data = "Tidak ada data dalam table";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container-sm mt-5">
        <div class="d-flex justify-content-between mb-5">
            <h2>Data Master Supplier</h2>
            <a href="create.php" class="btn btn-success">Tambah Data</a>
        </div>
        <hr>
        <table class="table table-bordered">
            <thead class="table-primary fw-bold">
                <td>No</td>
                <td>Nama</td>
                <td>Telp</td>
                <td>Alamat</td>
                <td>Tindakan</td>
            </thead>
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php $i = 1; ?>
                <?php foreach ($data as $item) : ?>
                    <tbody>
                        <td><?= $i++ ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['telp']; ?></td>
                        <td><?= $item['alamat']; ?></td>
                        <td>
                            <a href="update.php?id=<?= $item["id"]; ?>" class="btn btn-warning me-2">Edit</a>
                            <a href="delete.php?id=<?= $item["id"]; ?>" onclick="return confirm('Apakah Mau Hapus Data?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tbody>
                <?php endforeach; ?>
            <?php else : ?>
                <td colspan="5">
                    <p class="text-center fw-bold">Tidak Ada Data</p>
                </td>
            <?php endif; ?>

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>