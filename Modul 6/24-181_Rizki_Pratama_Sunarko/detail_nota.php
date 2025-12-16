<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id_nota = $_GET['id'];

$stmt_nota = $conn->prepare("
    SELECT n.*, p.nama AS pelanggan, p.telp, p.alamat
    FROM nota n
    LEFT JOIN pelanggan p ON n.id_pelanggan = p.id
    WHERE n.id_nota = ?
");
$stmt_nota->bind_param("i", $id_nota);
$stmt_nota->execute();
$nota = $stmt_nota->get_result()->fetch_assoc();

if (!$nota) {
    echo "Nota tidak ditemukan!";
    exit;
}

$stmt_items = $conn->prepare("
    SELECT i.*, b.nama_barang, b.kode_barang
    FROM item i
    LEFT JOIN barang b ON i.id_barang = b.id
    WHERE i.id_nota = ?
    ORDER BY i.id_item ASC
");
$stmt_items->bind_param("i", $id_nota);
$stmt_items->execute();
$items = $stmt_items->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Nota #<?= $nota['id_nota'] ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 { color: #333; margin-bottom: 20px; border-bottom: 3px solid #007bff; padding-bottom: 10px; }
        .info-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .info-box p {
            margin-bottom: 8px;
        }
        .info-box strong {
            display: inline-block;
            width: 150px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        .total-row {
            font-weight: bold;
            background: #f8f9fa;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-back:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Detail Nota #<?= $nota['id_nota'] ?></h2>
    
    <div class="info-box">
        <p><strong>Pelanggan:</strong> <?= htmlspecialchars($nota['pelanggan']) ?></p>
        <p><strong>Telepon:</strong> <?= htmlspecialchars($nota['telp']) ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($nota['alamat']) ?></p>
        <p><strong>Tanggal:</strong> <?= date('d/m/Y', strtotime($nota['tanggal'])) ?></p>
    </div>

    <a href="index.php" class="btn-back">← Kembali ke Halaman Utama</a>
    <table>