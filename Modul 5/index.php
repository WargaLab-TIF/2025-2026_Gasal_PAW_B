<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-4 text-blue-700">Data Master Supplier</h1>

    <a href="tambah.php" class="inline-block mb-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Tambah Data</a>

    <table class="w-full border-collapse border border-gray-300">
        <thead class="bg-blue-100 text-gray-800">
            <tr>
                <th class="border border-gray-300 p-2">No</th>
                <th class="border border-gray-300 p-2">Nama</th>
                <th class="border border-gray-300 p-2">Telp</th>
                <th class="border border-gray-300 p-2">Alamat</th>
                <th class="border border-gray-300 p-2">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM supplier");
            while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr class="hover:bg-gray-50">
                <td class="border p-2 text-center"><?= $no++; ?></td>
                <td class="border p-2"><?= $d['nama']; ?></td>
                <td class="border p-2"><?= $d['telp']; ?></td>
                <td class="border p-2"><?= $d['alamat']; ?></td>
                <td class="border p-2 text-center">
                    <a href="edit.php?id=<?= $d['id']; ?>" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm">Edit</a>
                    <a href="hapus.php?id=<?= $d['id']; ?>"
                       onclick="return confirm('Anda yakin akan menghapus supplier ini?');"
                       class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
