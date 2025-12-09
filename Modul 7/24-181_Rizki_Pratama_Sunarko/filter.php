<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Filter Laporan</title>
<style>
    body{
        font-family: Arial;
        margin: 30px;
    }

    .filter-box{
        background: #f3f3f3;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        display: inline-flex;
        gap: 10px;
        align-items: center;
    }

    .btn-green{
        padding: 8px 15px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
    }
</style>
</head>
<body>

<h2>Filter Laporan</h2>

<div class="filter-box">
    <form method="GET" action="laporan_hasil.php">
        <input type="date" name="tgl_mulai" required>
        <input type="date" name="tgl_selesai" required>
        <button class="btn-green">Tampilkan</button>
    </form>
</div>

</body>
</html>
