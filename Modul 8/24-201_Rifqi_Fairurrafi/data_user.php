<?php
require 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM user");
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <p class="text-primary fs-3 m-0">Daftar User</p>
        <div class="d-flex justify-content-end"><button class="btn btn-green-gradient px-2 py-2" type="button" onclick="window.location.href='tambah_user.php'">Tambah User</button></div>
        
        <hr class="mb-4 mt-0">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">Username</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-2">Level</th>
                    <th class="col-md-2">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)):?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td>
                            <?php
                            if($row['level'] == 1){
                                echo "Admin";
                            } elseif ($row['level'] == 2){
                                echo "User Biasa";
                            } else {
                                echo "Level INVALID";
                            }
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-orange-gradient px-3 py-2" type="button" onclick="window.location.href='edit_user.php'">Edit</button>
                            <button class="btn btn-red-gradient px-3 py-2" type="button" onclick="window.location.href='hapus_user.php'">Hapus</button>
                        </td>
                    </tr>
                <?php endwhile?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>