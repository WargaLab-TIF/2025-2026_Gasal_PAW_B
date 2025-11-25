<?php 
// edit_user.php
include 'config.php';
// Pastikan header.php memuat CSS Bootstrap
include '../header.php';
include '../../auth.php'; 

// Ambil ID dari URL
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $hp       = $_POST['hp'];
    $level    = $_POST['level'];

    // Logika Update Password
    // Jika password diisi, enkripsi dan update. Jika kosong, skip kolom password.
    if($_POST['password'] != ""){
        $password = md5($_POST['password']); // Catatan: Sebaiknya gunakan password_hash() untuk keamanan lebih baik
        $query = "UPDATE user SET 
                    username='$username',
                    password='$password',
                    nama='$nama',
                    alamat='$alamat',
                    hp='$hp',
                    level='$level'
                  WHERE id_user=$id";
    } else {
        $query = "UPDATE user SET 
                    username='$username',
                    nama='$nama',
                    alamat='$alamat',
                    hp='$hp',
                    level='$level'
                  WHERE id_user=$id";
    }

    $update = mysqli_query($conn, $query);

    if($update){
        echo "<script>alert('Data user berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}
?>

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data Pengguna</h5>
                    <small>ID User: #<?= $id ?></small>
                </div>
                
                <div class="card-body p-4">
                    <form action="" method="POST">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Level Akses</label>
                                <select name="level" class="form-select">
                                    <option value="1" <?= ($row['level']==1)?'selected':''; ?>>Admin Utama</option>
                                    <option value="2" <?= ($row['level']==2)?'selected':''; ?>>Kasir</option>
                                    <option value="3" <?= ($row['level']==3)?'selected':''; ?>>Gudang</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Password Baru</label>
                            <input type="password" name="password" class="form-control" placeholder="******">
                            <div class="form-text text-danger">
                                <i class="bi bi-info-circle"></i> Biarkan kosong jika tidak ingin mengubah password.
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row mb-3">
                            <div class="col-md-7">
                                <label class="form-label fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold">No. Handphone</label>
                                <input type="text" name="hp" class="form-control" value="<?= $row['hp'] ?>" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Alamat Domisili</label>
                            <textarea name="alamat" class="form-control" rows="3"><?= $row['alamat'] ?></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="index.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Batal
                            </a>
                            <button type="submit" name="submit" class="btn btn-success px-4">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>