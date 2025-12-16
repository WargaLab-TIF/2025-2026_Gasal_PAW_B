<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Master Supplier</title>
</head>
<body>

<h2>Data Master Supplier</h2>
<a href="tambah.php">+ Tambah Data</a>
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
$data = mysqli_query($koneksi, "SELECT * FROM supplier");
while($d = mysqli_fetch_array($data)){
?>
<tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo $d['nama']; ?></td>
  <td><?php echo $d['telp']; ?></td>
  <td><?php echo $d['alamat']; ?></td>
  <td>
      <a href="edit.php?id=<?php echo $d['id']; ?>">Edit</a> |
      <a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
  </td>
</tr>
<?php } ?>
</table>

</body>
</html>
