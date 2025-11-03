<?php

include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Master Supplier</title>
</head>
<body>

<h2>Data Master Supplier</h2>
<form action="tambah data.php" method="get" style="display:inline;">
  <button type="submit" class="btn btn-success">Tambah Data</button>
</form>
<br><br>

<table border="1" cellpadding="10">
<tr>
  <th>No</th>
  <th>Nama</th>
  <th>Telp</th>
  <th>Alamat</th>
  <th>Tindakan</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM supplier");
while($d = mysqli_fetch_array($data)){
?>
<tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo $d['nama']; ?></td>
  <td><?php echo $d['telp']; ?></td>
  <td><?php echo $d['alamat']; ?></td>
  <td>
      <a href="edit data.php?id=<?php echo $d['id']; ?>">Edit</a> |
      <a href="hapus data.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
  </td>
</tr>
<?php } 

?>
</table>

</body>
</html>
