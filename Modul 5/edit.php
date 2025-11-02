<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-lg">
    <h2 class="text-xl font-semibold text-blue-700 mb-4">Edit Data Master Supplier</h2>

    <form method="post" action="">
        <label class="block mb-2 text-sm font-medium">Nama</label>
        <input type="text" name="nama" value="<?= $d['nama']; ?>" class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-200" required>

        <label class="block mb-2 text-sm font-medium">Telp</label>
        <input type="text" name="telp" value="<?= $d['telp']; ?>" class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-200" required>

        <label class="block mb-2 text-sm font-medium">Alamat</label>
        <input type="text" name="alamat" value="<?= $d['alamat']; ?>" class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-200" required>

        <div class="flex gap-3">
            <button type="submit" name="update" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Update</button>
            <a href="index.php" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg">Batal</a>
        </div>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $update = mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
        if ($update) {
            echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
        }
    }
    ?>
</div>

</body>
</html>
