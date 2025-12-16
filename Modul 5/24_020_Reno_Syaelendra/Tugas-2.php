<?php
// FILE: Tugas-2.php
session_start(); 
include 'koneksi.php';
include 'validate.inc'; 

$errors = []; 
$input = [];

// === LOGIKA PROSES TAMBAH (Digabung) ===
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
        // Jika tidak ada error, simpan
        $stmt = $conn->prepare("INSERT INTO penjualan_supplier (nama, telp, alamat) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $telp, $alamat);

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
    
    // Jika ada error, simpan ke session untuk ditampilkan di form
    $_SESSION['errors'] = $errors;
    $_SESSION['input'] = $input;
    header("Location: Tugas-2.php"); // Refresh halaman form
    exit();

} else {
    // === LOGIKA TAMPILKAN FORM (GET Request) ===
    $errors = $_SESSION['errors'] ?? [];
    $input = $_SESSION['input'] ?? [];
    unset($_SESSION['errors']);
    unset($_SESSION['input']);
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; } h2 { color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 300px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn { padding: 10px 15px; border: none; border-radius: 4px; text-decoration: none; color: white; cursor: pointer; }
        .btn-simpan { background-color: #007bff; } .btn-batal { background-color: #6c757d; }
        .error-message { color: #dc3545; font-size: 0.9em; margin-top: 5px; }
        .form-group input.error, .form-group textarea.error { border-color: #dc3545; }
    </style>
</head>
<body>
    <h2>Tambah Data Master Supplier Baru</h2>
    <form action="Tugas-2.php" method="POST">
        <?php if (isset($errors['db'])): ?>
            <div class="error-message"><?php echo $errors['db']; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" 
                   class="<?php echo isset($errors['nama']) ? 'error' : ''; ?>"
                   value="<?php echo htmlspecialchars($input['nama'] ?? ''); ?>" 
                   placeholder="Nama" required>
            <?php if (isset($errors['nama'])): ?>
                <div class="error-message"><?php echo $errors['nama']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp"
                   class="<?php echo isset($errors['telp']) ? 'error' : ''; ?>"
                   value="<?php echo htmlspecialchars($input['telp'] ?? ''); ?>"
                   placeholder="telp">
            <?php if (isset($errors['telp'])): ?>
                <div class="error-message"><?php echo $errors['telp']; ?></div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="4"
                      class="<?php echo isset($errors['alamat']) ? 'error' : ''; ?>"
                      placeholder="alamat" required><?php echo htmlspecialchars($input['alamat'] ?? ''); ?></textarea>
            <?php if (isset($errors['alamat'])): ?>
                <div class="error-message"><?php echo $errors['alamat']; ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-simpan">Simpan</button>
        <a href="Tugas-1.php" class="btn btn-batal">Batal</a>
    </form>
</body>
</html>