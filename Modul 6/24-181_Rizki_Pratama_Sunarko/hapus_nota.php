<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?status=error");
    exit;
}

$id_nota = $_GET['id'];

try {
    $conn->begin_transaction();
    
    $stmt_get = $conn->prepare("
        SELECT id_barang, qty 
        FROM item 
        WHERE id_nota = ?
    ");
    $stmt_get->bind_param("i", $id_nota);
    $stmt_get->execute();
    $result = $stmt_get->get_result();
    
    $stmt_update = $conn->prepare("
        UPDATE barang 
        SET stok = stok + ? 
        WHERE id = ?
    ");
    
    while ($item = $result->fetch_assoc()) {
        $stmt_update->bind_param("ii", $item['qty'], $item['id_barang']);
        $stmt_update->execute();
    }
    
    $stmt_get->close();
    $stmt_update->close();
    
    $stmt_item = $conn->prepare("DELETE FROM item WHERE id_nota = ?");
    $stmt_item->bind_param("i", $id_nota);
    
    if (!$stmt_item->execute()) {
        throw new Exception("Gagal menghapus item!");
    }
    $stmt_item->close();

    $stmt_nota = $conn->prepare("DELETE FROM nota WHERE id_nota = ?");
    $stmt_nota->bind_param("i", $id_nota);
    
    if (!$stmt_nota->execute()) {
        throw new Exception("Gagal menghapus nota!");
    }
    $stmt_nota->close();
    
    $conn->commit();
    
    header("Location: index.php?status=deleted");
    exit;
    
} catch (Exception $e) {
    $conn->rollback();
    
    header("Location: index.php?status=error");
    exit;
}
?>