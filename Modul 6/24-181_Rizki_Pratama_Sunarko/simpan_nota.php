<?php
include 'koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'] ?? '';
$tanggal = $_POST['tanggal'] ?? date('Y-m-d');
$barang_ids = $_POST['id_barang'] ?? [];
$hargas = $_POST['harga'] ?? [];
$qtys = $_POST['qty'] ?? [];

$errors = []; 

// Validasi untuuk pelanggan
if (empty($id_pelanggan)) {
    $errors[] = "Nama pelanggan wajib diisi.";
} else {
    $stmt_pel = $conn->prepare("SELECT id FROM pelanggan WHERE id = ?");
    $stmt_pel->bind_param("s", $id_pelanggan);
    $stmt_pel->execute();
    $result_pel = $stmt_pel->get_result();
    
    if ($result_pel->num_rows === 0) {
        $errors[] = "❌ Pelanggan tidak ditemukan di database!";
    }
    $stmt_pel->close();
}

if (empty($tanggal)) {
    $errors[] = "Tanggal wajib diisi.";
}


if (empty($barang_ids) || count(array_filter($barang_ids)) === 0) {
    $errors[] = "Minimal pilih satu barang.";
}

// Validasii setiap item
$valid_items = [];
for ($i = 0; $i < count($barang_ids); $i++) {
    if (!empty($barang_ids[$i]) && !empty($qtys[$i]) && $qtys[$i] > 0) {
        $valid_items[] = [
            'id_barang' => $barang_ids[$i],
            'harga'     => $hargas[$i],
            'qty'       => $qtys[$i]
        ];
    }
}

if (count($valid_items) === 0) {
    $errors[] = "Tidak ada item yang valid.";
}

// Untuk cek errornya
if (count($errors) > 0) {
    echo "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Terjadi Kesalahan</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <style>
            body { background: #f8f9fa; font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin-top: 80px; }
            .card { border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
            h3 { color: #dc3545; }
            ul li { margin-bottom: 6px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='card p-4'>
                <h3 class='mb-3'>❌ Terjadi Kesalahan</h3>
                <ul>";
                foreach ($errors as $e) {
                    echo "<li>$e</li>";
                }
    echo "
                </ul>
                <div class='mt-3'>
                    <a href='index.php' class='btn btn-secondary'>&larr; Kembali ke Form</a>
                </div>
            </div>
        </div>
    </body>
    </html>";
    exit;
}

try {
    $conn->begin_transaction();
    
    // Ngitung total harga
    $total_harga = 0;
    foreach ($valid_items as $item) {
        $total_harga += ($item['harga'] * $item['qty']);
    }
    
    // validasi stok barang
    $stmt_check = $conn->prepare("SELECT stok FROM barang WHERE id = ?");
    foreach ($valid_items as $item) {
        $stmt_check->bind_param("i", $item['id_barang']);
        $stmt_check->execute();
        $result = $stmt_check->get_result();
        $barang = $result->fetch_assoc();
        
        if (!$barang || $barang['stok'] < $item['qty']) {
            throw new Exception("Stok barang tidak mencukupi!");
        }
    }
    $stmt_check->close();
    
    // buat nyimpen ke tabel nota(master)
    $stmt_nota = $conn->prepare("
        INSERT INTO nota (id_pelanggan, tanggal, total_harga)
        VALUES (?, ?, ?)
    ");
    
    $stmt_nota->bind_param("ssd", $id_pelanggan, $tanggal, $total_harga);
    
    if (!$stmt_nota->execute()) {
        throw new Exception("Gagal menyimpan nota: " . $stmt_nota->error);
    }
    
    $id_nota = $conn->insert_id;
    $stmt_nota->close();
    
    // untuk nyimpen ke tabel item(detail) ---
    $stmt_item = $conn->prepare("
        INSERT INTO item (id_nota, id_barang, qty, harga, subtotal)
        VALUES (?, ?, ?, ?, ?)
    ");
    
    foreach ($valid_items as $item) {
        $subtotal = $item['harga'] * $item['qty'];
        
        $stmt_item->bind_param(
            "iiidd",
            $id_nota,
            $item['id_barang'],
            $item['qty'],
            $item['harga'],
            $subtotal
        );
        
        if (!$stmt_item->execute()) {
            throw new Exception("Gagal menyimpan item: " . $stmt_item->error);
        }
    }
    $stmt_item->close();
    
    // update stok barang
    $stmt_update = $conn->prepare("
        UPDATE barang 
        SET stok = stok - ? 
        WHERE id = ? AND stok >= ?
    ");
    
    foreach ($valid_items as $item) {
        $stmt_update->bind_param(
            "iii",
            $item['qty'],
            $item['id_barang'],
            $item['qty']
        );
        
        if (!$stmt_update->execute()) {
            throw new Exception("Gagal update stok barang!");
        }
        
        if ($stmt_update->affected_rows === 0) {
            throw new Exception("Stok barang tidak mencukupi saat update!");
        }
    }
    $stmt_update->close();
    

    $conn->commit();
    
    header("Location: index.php?status=sukses");
    exit;
    
} catch (Exception $e) {
    $conn->rollback();
    
    echo "
    <!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Gagal Menyimpan Transaksi</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        <style>
            body { background: #f8d7da; font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin-top: 80px; }
            .card { background: #fff; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
            h3 { color: #dc3545; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='card p-4'>
                <h3>Gagal Menyimpan Transaksi</h3>
                <p><strong>Error:</strong> {$e->getMessage()}</p>
                <p><strong>Detail:</strong> Pastikan nama pelanggan dan barang sudah benar.</p>
                <a href='index.php' class='btn btn-secondary'>&larr; Kembali ke Form</a>
            </div>
        </div>
    </body>
    </html>";
    exit;
}
?>
