<?php
require_once "koneksi.php";

$requiredNama = "";
$requiredTelepon = "";
$requiredAlamat = "";
$namaError = "";
$telpError = "";

// ambil id di url
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ambil data supplier sesuai id
    $sql = "SELECT * FROM supplier WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 0) {
        echo "<script>
                alert('Id Tidak Ditemukan!');
                document.location.href = 'DataMahasiswa.php';
            </script>";
    }
    $spl = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
        // menangkap data dari form
        $nama = htmlspecialchars(trim($_POST['nama']));
        $telp = htmlspecialchars(trim($_POST['telp']));
        $alamat = htmlspecialchars(trim($_POST['alamat']));

        // validasi 
        if (empty($nama)) {
            $requiredNama = "Mohon isi nama terlebih dahulu!";
        } if (empty($telp)) {
            $requiredTelepon = "Mohon isi telepon terlebih dahulu!";
        } if (empty($alamat)) {
            $requiredAlamat = "Mohon isi alamat terlebih dahulu!";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $namaError = "Harus berisi huruf abjad A-Z";
        } elseif (!preg_match("/^\d{12}$/", $telp)) {
            $telpError = "Nomor telepon harus terdiri dari 12 angka.";
        } else {


            $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";
            mysqli_query($conn, $sql);

            echo "<script>
                    document.location.href = 'index.php';
                    alert('Data berhasil diubah!');
            </script>";

            // menunjukan adanya perubahan data
            return mysqli_affected_rows($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mb-5 mt-5">Edit Data Supplier Baru</h1>
        <form action="" method="POST">
            Masukan Nama :
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama" name="nama" value="<?= $spl['nama']; ?>">
                <span class="text-danger"><?= $requiredNama; ?></span>
                <span class="text-danger"><?= $namaError; ?></span>
            </div>
            Masukan Telepon :
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Telepon" name="telp" value="<?= $spl['telp']; ?>">
                <span class="text-danger"><?= $requiredTelepon; ?></span>
                <span class="text-danger"><?= $telpError; ?></span>
            </div>
            Masukan Alamat :
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Alamat" name="alamat" value="<?= $spl['alamat']; ?>">
                <span class="text-danger"><?= $requiredAlamat; ?></span>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <a href="index.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>