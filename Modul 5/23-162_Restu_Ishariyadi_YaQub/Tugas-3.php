<?php

require_once "koneksi.php";

$pesan = "";
$nama = "";
$telp = "";
$alamat = "";
$id = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: Tugas-1.php");
        exit;
    } else {
        $pesan = "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM supplier WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Cek apakah data ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $nama = $row['nama'];
        $telp = $row['telp'];
        $alamat = $row['alamat'];
    } else {

        $pesan = "Data supplier tidak ditemukan.";

    }
} else {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: Tugas-1.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container form-container">
        <h2>Edit Data Master Supplier</h2>

        <?php if (!empty($pesan)) : ?>
            <div class="pesan-error"><?php echo $pesan; ?></div>
        <?php endif; ?>

        <form action="Tugas-3.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="text" id="telp" name="telp" value="<?php echo htmlspecialchars($telp); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" required><?php echo htmlspecialchars($alamat); ?></textarea>
            </div>
            
            <div class="form-buttons">
                <button type="submit" class="btn btn-update">Update</button>
                
                <a href="Tugas-1.php" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>

<?php

mysqli_close($conn);

?>