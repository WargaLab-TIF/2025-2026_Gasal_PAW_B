<?php
// FILE: Tugas-3.php
session_start(); 
include 'koneksi.php';
include 'validate.inc'; 

$errors = [];
$input = [];
$id = $_GET['id'] ?? $_POST['id']; // Ambil ID dari GET atau POST

if (empty($id)) {
    header("Location: Tugas-1.php");
    exit();
}

// === LOGIKA PROSES EDIT (Digabung) ===
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $telp = htmlspecialchars($_POST['telp']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $input['nama'] = $nama;
    $input['telp'] = $telp;
    $input['alamat'] = $alamat;

    if (isEmpty($nama)) { $errors['nama'] = 'Nama tidak boleh kosong.'; }
    if (!isEmpty($telp) && !isValidPhone($telp)) { $errors['telp'] = 'Nomor telepon hanya boleh berisi angka.'; }
    if (isEmpty($alamat)) { $errors['alamat'] = 'Alamat tidak boleh kosong.'; }

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE penjualan_supplier SET nama = ?, telp = ?, alamat = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nama, $telp, $alamat, $id);

        if ($stmt->execute()) {
            unset($_SESSION['errors']); // Hapus session jika sukses
            unset($_SESSION['input']);
            header("Location: Tugas-1.php"); // Redirect ke halaman utama
            exit();
        } else {
            $errors['db'] = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    
    // Jika ada error, simpan ke session
    $_SESSION['errors'] = $errors;
    $_SESSION['input'] = $input;
    header("Location: Tugas-3.php?id=" . $id); // Refresh halaman form
    exit();

} else {
    // === LOGIKA TAMPILKAN FORM (GET Request) ===
    $errors = $_SESSION['errors'] ?? [];
    $input_lama = $_SESSION['input'] ?? [];
    unset($_SESSION['errors']);
    unset($_SESSION['input']);

    // Ambil data dari DB
    $stmt = $conn->prepare("SELECT nama, telp, alamat FROM penjualan_supplier WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data_db = $result->fetch_assoc();
    $stmt->close();

    if (!$data_db) {
        echo "Data tidak ditemukan!";
        exit;
    }

    // Prioritaskan input lama (jika ada error), baru data DB
    $nama = $input_lama['nama'] ?? $data_db['nama'];
    $telp = $input_lama['telp'] ?? $data_db['telp'];
    $alamat = $input_lama['alamat'] ?? $data_db['alamat'];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; } h2 { color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 300px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn { padding: 10px 15px; border: none; border-radius: 4px; text-decoration: none; color: white; cursor: pointer; }
        .btn-update { background-color: #28a745; } .btn-batal { background-color: #dc3545; }
        .error-message { color: #dc3545; font-size: 0.9em; margin-top: 5px; }
        .form-group input.error, .form-group textarea.error { border-color: #dc3545; }
    </style>
</head>
<body>
    <h2>Edit Data Master Supplier</h2>
    <form action="Tugas-3.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php if (isset($errors['db'])): ?>
            <div class="error-message"><?php echo $errors['db']; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" 
                   class="<?php echo isset($errors['nama']) ? 'error' : ''; ?>"
                   value="<?php echo htmlspecialchars($nama); ?>" required>
            <?php if (isset($errors['nama'])): ?>
                <div class="error-message"><?php echo $errors['nama']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp"
                   class="<?php echo isset($errors['telp']) ? 'error' : ''; ?>"
                   value="<?php echo htmlspecialchars($telp); ?>">
            <?php if (isset($errors['telp'])): ?>
                <div class="error-message"><?php echo $errors['telp']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4"
                      class="<?php echo isset($errors['alamat']) ? 'error' : ''; ?>"
                      required><?php echo htmlspecialchars($alamat); ?></textarea>
            <?php if (isset($errors['alamat'])): ?>
                <div class="error-message"><?php echo $errors['alamat']; ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-update">Update</button>
        <a href="Tugas-1.php" class="btn btn-batal">Batal</a>
    </form>
</body>
</html>