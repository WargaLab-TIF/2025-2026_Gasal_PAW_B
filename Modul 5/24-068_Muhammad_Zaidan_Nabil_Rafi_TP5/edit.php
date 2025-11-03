<?php
include "koneksi.php";
$d = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$_GET[id]'"));
?>

<h2>Edit Data Master Supplier</h2>

<form method="post">
  Nama <br>
  <input type="text" name="nama" value="<?php echo $d['nama']; ?>"><br><br>

  Telp <br>
  <input type="text" name="telp" value="<?php echo $d['telp']; ?>"><br><br>

  Alamat <br>
  <textarea name="alamat"><?php echo $d['alamat']; ?></textarea><br><br>

  <input type="submit" name="update" value="Update">
  <a href="index.php">Batal</a>
</form>

<?php
if(isset($_POST['update'])){
    mysqli_query($koneksi, "UPDATE supplier SET 
        nama='$_POST[nama]', 
        telp='$_POST[telp]', 
        alamat='$_POST[alamat]' 
        WHERE id='$_GET[id]'");
    echo "<script>alert('Data Terupdate');document.location='index.php'</script>";
}
?>
