<?php include "koneksi.php"; ?>

<h2>Tambah Data Master Supplier Baru</h2>

<form method="post">
  Nama <br>
  <input type="text" name="nama"><br><br>

  Telp <br>
  <input type="text" name="telp"><br><br>

  Alamat <br>
  <textarea name="alamat"></textarea><br><br>

  <input type="submit" name="simpan" value="Simpan">
  <a href="index.php">Batal</a>
</form>

<?php
if(isset($_POST['simpan'])){
mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$_POST[nama]', '$_POST[telp]', '$_POST[alamat]')");
    echo "<script>alert('Data Tersimpan');document.location='index.php'</script>";
}
?>
