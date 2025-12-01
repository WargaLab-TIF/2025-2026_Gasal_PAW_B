<?php
session_start();
include 'koneksi.php';
if ($_SESSION['level'] != 1) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Master User</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Data User</h2>
        <a href="CRUD/tambah_user.php" class="btn btn-green">+ Tambah User</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $q = mysqli_query($conn, "SELECT * FROM user");
                while ($d = mysqli_fetch_array($q)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['username'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= ($d['level'] == 1) ? 'Admin' : 'User' ?></td>
                        <td>
                            <a href="CRUD/edit_user.php?= $d['id_user'] ?>" class="btn btn-orange">Edit</a>
                            <a href="CRUD/hapus_user.php?id=<?= $d['id_user'] ?>" class="btn btn-red" onclick="return confirm('Hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>