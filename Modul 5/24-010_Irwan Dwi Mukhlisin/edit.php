<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM supplier WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE supplier SET nama = ?, telp = ?, alamat = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nama, $telp, $alamat, $id);

    if ($stmt->execute()) {
        header("Location: data.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
</head>

<body>
    <h2>Edit Data Supplier</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required> <br><br>
        Telp: <input type="number" name="telp" value="<?php echo $row['telp']; ?>" required> <br><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required> <br><br>

        <button type="submit" name="submit">Update</button>
        <a href="data.php"><button type="button">Kembali</button></a>
    </form>
</body>

</html>