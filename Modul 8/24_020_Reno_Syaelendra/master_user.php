<?php 
session_start();
include 'koneksi.php';
if($_SESSION['level'] != 1){ header("location:index.php"); exit; }

// --- PROSES SIMPAN ---
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // Enkripsi MD5
    $level = $_POST['level'];
    
    mysqli_query($koneksi, "INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$user', '$pass', '$level')");
    echo "<script>alert('User Baru Berhasil Ditambahkan!'); window.location='master_user.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head><title>Master User</title><link rel="stylesheet" href="style.css"></head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        
        <!-- MODE FORM -->
        <?php if(isset($_GET['act']) && $_GET['act'] == 'tambah'){ ?>
            <h3>Tambah User Baru</h3>
            <form method="post">
                <div class="form-group"><label>Nama Lengkap</label><input type="text" name="nama" required></div>
                <div class="form-group"><label>Username</label><input type="text" name="username" required></div>
                <div class="form-group"><label>Password</label><input type="password" name="password" required></div>
                <div class="form-group"><label>Level Akses</label>
                    <select name="level">
                        <option value="1">Admin (Level 1)</option>
                        <option value="2">User Biasa (Level 2)</option>
                    </select>
                </div>
                <a href="master_user.php" class="btn-download btn-back">Kembali</a>
                <button type="submit" name="simpan" class="btn-download btn-excel">Simpan User</button>
            </form>

        <!-- MODE TABEL -->
        <?php } else { ?>
            <div style="display:flex; justify-content:space-between;">
                <h2>Data User</h2> <a href="data_master.php" class="btn-download btn-back">Kembali</a>
            </div>
            <a href="master_user.php?act=tambah" class="btn-download btn-excel" style="margin:15px 0;">+ Tambah User</a>
            <table>
                <thead><tr><th>No</th><th>Nama Lengkap</th><th>Username</th><th>Level</th></tr></thead>
                <tbody>
                    <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM user"); while($d=mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td>
                            <?php echo ($d['level'] == 1) ? "<b style='color:green;'>Admin</b>" : "<span style='color:blue;'>User</span>"; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>

    </div>
</body>
</html>