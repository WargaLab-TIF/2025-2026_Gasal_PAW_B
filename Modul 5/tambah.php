<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-lg">
    <h2 class="text-xl font-semibold text-blue-700 mb-4">Tambah Data Master Supplier Baru</h2>

    <form method="post" action="">
        <label class="block mb-2 text-sm font-medium">Nama</label>
        <input type="text" name="nama" class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-200" required>

        <label class="block mb-2 text-sm font-medium">Telp</label>
        <input type="text" name="telp" class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-200" required>

        <label class="block mb-2 text-sm font-medium">Alamat</label>
        <input type="text" name="alamat" class="w-full border rounded-lg p-2 mb-4 focus:ring focus:ring-blue-200" required>

        <div class="flex gap-3">
            <button type="submit" name="simpan" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Simpan</button>
            <a href="index.php" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Batal</a>
        </div>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $query = mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");
        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
        }
    }
    ?>
</div>

</body>
</html>
