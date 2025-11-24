<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){ header("location:login.php?pesan=Anda belum login!"); exit; }
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master User</title>
    <style>
        body { font-family: sans-serif; margin: 0; }
        .container { padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-tambah { background: #4CAF50; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; }
        .btn-edit { background: #ff9800; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;}
        .btn-hapus { background: #d32f2f; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; font-size: 12px;}
        .notif { color: #28a745; font-weight: bold; font-style: italic; margin-bottom: 15px; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h3>Manajemen User</h3>
        
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "tambah") echo "<div class='notif'>>> Data berhasil ditambahkan!</div>";
            else if($_GET['pesan'] == "update") echo "<div class='notif'>>> Data berhasil diperbarui!</div>";
            else if($_GET['pesan'] == "hapus") echo "<div class='notif'>>> Data berhasil dihapus!</div>";
        }
        ?>

        <a href="tambah_user.php" class="btn-tambah">+ Tambah User</a>
        <br><br>
        <table>
            <tr>
                <th>No</th><th>Username</th><th>Nama</th><th>Level</th><th>Tindakan</th>
            </tr>
            <?php 
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM user");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo ($d['level'] == 1) ? "Admin" : "User Biasa"; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $d['id_user']; ?>" class="btn-edit">Edit</a>
                    <a href="hapus_user.php?id=<?php echo $d['id_user']; ?>" class="btn-hapus" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>