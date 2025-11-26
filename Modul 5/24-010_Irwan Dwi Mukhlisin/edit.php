<?php
$errors = [];
require_once "koneksi.php";
require_once "function.php";

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

    validateName($errors, $_POST, 'nama');
    validateTelp($errors, $_POST, 'telp');
    validateAlamat($errors, $_POST, 'alamat');

    if (empty($errors)) {
        $sql = "UPDATE supplier SET nama = ?, telp = ?, alamat = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nama, $telp, $alamat, $id);

        if ($stmt->execute()) {
            header("Location: data.php");
            exit();
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
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Edit Data Supplier</h2>
    <table>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <tr>
                <td>
                    <label for="">Nama : </label>
                </td>
                <td>
                    <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
                </td>
                <td>
                    <span><?= isset($errors['nama']) ? $errors['nama'] : '' ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Telp : </label>
                </td>
                <td>
                    <input type="text" name="telp" value="<?php echo $row['telp']; ?>">
                </td>
                <td>
                    <span><?= isset($errors['telp']) ? $errors['telp'] : '' ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Alamat : </label>
                </td>
                <td>
                    <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>">
                </td>
                <td>
                    <span><?= isset($errors['alamat']) ? $errors['alamat'] : '' ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="submit">Update</button>
                    <a href="data.php"><button type="button">Kembali</button></a>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>