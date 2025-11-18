<?php 
$tgl1 = $_GET['tgl1'] ?? date('Y-m-01');
$tgl2 = $_GET['tgl2'] ?? date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filter Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2><b>REPORTING</b></h2>
<h4>Filter Rentan Awal - Akhir</h4>

<div class="container mt-3">
    <form action="hasil.php" method="GET" class="d-flex align-items-center gap-3 mb-4">

        <div class="d-flex flex-column" style="max-width: 180px;">
            <label class="form-label mb-1">Rentan Awal</label>
            <input type="date" name="tgl1" value="<?= $tgl1 ?>" class="form-control">
        </div>

        <div class="d-flex flex-column" style="max-width: 180px;">
            <label class="form-label mb-1">Rentan Akhir</label>
            <input type="date" name="tgl2" value="<?= $tgl2 ?>" class="form-control">
        </div>

        <button class="btn btn-success mt-3">Tampilkan</button>
    </form>
</div>

</body>
</html>
