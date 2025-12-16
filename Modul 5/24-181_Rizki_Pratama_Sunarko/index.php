<?php require 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Data Master Supplier</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container { 
    width: 90%; 
    margin: 30px auto; 
}

h2 {
    color: #2a6ebb;
    margin-bottom: 10px;
    font-size: 22px;
    font-weight: bold;
}

.btn-add {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    float: right; 
}

hr {
    clear: both; 
    border: 0;
    border-bottom: 1px solid #ccc;
    margin-top: 10px;
    margin-bottom: 15px;
}

table {
    border-collapse: collapse;
    width: 100%;
    background: white;
    font-size: 14px;
}

th {
    background: #d6eaff;
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

td {
    padding: 10px;
    border: 1px solid #ddd;
}

th:first-child, td:first-child {
    width: 50px;
    text-align: center;
}

.btn-edit {
    background: #f0ad4e;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 13px;
}

.btn-delete {
    background: #d9534f;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 13px;
}

a { text-decoration: none; }
</style>
</head>

<body>

<div class="container">

<h2>Data Master Supplier</h2>

<a href="tambah.php"><button class="btn-add">Tambah Data</button></a>

<hr> 

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Telp</th>
    <th>Alamat</th>
    <th>Tindakan</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM supplier");
while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['telp']; ?></td>
    <td><?= $row['alamat']; ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id']; ?>"><button class="btn-edit">Edit</button></a>
        <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?');">
            <button class="btn-delete">Hapus</button>
        </a>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
