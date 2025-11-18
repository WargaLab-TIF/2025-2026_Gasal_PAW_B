<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Filter & Grafik Chart.js</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f6f6f6;
        padding: 20px;
    }

    h2 {
        margin-bottom: 20px;
        font-weight: 600;
    }

    .filter-box {
        background: white;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #ddd;
        width: fit-content;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 25px;
    }

    .filter-box input[type="date"] {
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        width: 150px;
    }

    .btn-tampil {
        background: #4CAF50;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-tampil:hover {
        background: #47a04a;
    }
</style>
</head>
<body>
    <h2>Filter Tanggal & Grafik</h2>
    <form method="GET" action="Tugas-4.php">
        <div class="filter-box">
            <input type="date" name="tgl_awal" value="<?= $awal ?>" required>
            <input type="date" name="tgl_akhir" value="<?= $akhir ?>" required>
            <button type="submit" class="btn-tampil" >Tampilkan</button>
        </div>
    </form>
</body>
</html>
