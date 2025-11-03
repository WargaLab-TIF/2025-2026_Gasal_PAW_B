<?php
include 'koneksi.php';
include 'validate.inc';

$errors = []; 
$nama = '';
$telp = '';
$alamat = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    validateNama($errors, $_POST, 'nama');
    validateTelp($errors, $_POST, 'telp');
    validateAlamat($errors, $_POST, 'alamat');

    if (empty($errors)) {
        $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $nama, $telp, $alamat);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: Tugas-1.php"); 
            exit;
        } else {
            echo '<div class="alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Data Master Supplier Baru</h2>
                </div>
                <div class="card-body">

                    <?php
                    if (!empty($errors) && $_SERVER["REQUEST_METHOD"] == "POST") {
                        echo '<div class="alert alert-danger" role="alert"><strong>Validasi Gagal!</strong> Harap perbaiki error di bawah.</div>';
                    }
                    ?>
                    
                    <form action="tugas-2.php" method="POST">
                        
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?php echo isset($errors['nama']) ? 'is-invalid' : ''; ?>" 
                                       id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" 
                                       placeholder="Nama" required> <div class="invalid-feedback">
                                    <?php echo $errors['nama'] ?? ''; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?php echo isset($errors['telp']) ? 'is-invalid' : ''; ?>" 
                                       id="telp" name="telp" value="<?php echo htmlspecialchars($telp); ?>" 
                                       placeholder="telp" required> <div class="invalid-feedback">
                                    <?php echo $errors['telp'] ?? ''; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control <?php echo isset($errors['alamat']) ? 'is-invalid' : ''; ?>" 
                                          id="alamat" name="alamat" rows="3" 
                                          placeholder="alamat" required><?php echo htmlspecialchars($alamat); ?></textarea> <div class="invalid-feedback">
                                    <?php echo $errors['alamat'] ?? ''; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                
                                <a href="Tugas-1.php" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>