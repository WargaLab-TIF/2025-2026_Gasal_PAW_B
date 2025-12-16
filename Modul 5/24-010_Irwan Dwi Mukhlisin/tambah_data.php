<?php
$errors = [];
include "koneksi.php";
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    validateName($errors, $_POST, 'nama');
    validateTelp($errors, $_POST, 'telp');
    validateAlamat($errors, $_POST, 'alamat');

    if (empty($errors)) {
        $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nama, $telp, $alamat);

        if ($stmt->execute()) {
            header("Location: data.php");
            exit();
        }
    }
}

function validateName(&$error, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $error[$field_name] = 'Nama wajib diisi';
    } elseif (!preg_match($pattern, $field_list[$field_name]))
        $error[$field_name] = 'Format nama tidak sesuai';
}
function validateTelp(&$error, $field_list, $field_name)
{
    $pattern = "/^[0-9]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $error[$field_name] = 'Telp wajib diisi';
    } elseif (!preg_match($pattern, $field_list[$field_name]))
        $error[$field_name] = 'Telp telp wajib angka';
}
function validateAlamat(&$error, $field_list, $field_name)
{
    if (trim($field_list[$field_name]) == "") {
        $error[$field_name] = "alamat tidak boleh kosong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Tambah Buku</h2>
    <table>
        <form method="POST">
            <tr>
                <td>
                    <label for="">Nama</label>
                </td>
                <td>
                    <input type="text" name="nama"
                        value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>">
                </td>
                <td>
                    <span><?= isset($errors['nama']) ? $errors['nama'] : '' ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Telp :</label>
                </td>
                <td>
                    <input type="number" name="telp"
                        value="<?= isset($_POST['telp']) ? htmlspecialchars($_POST['telp']) : '' ?>">
                </td>
                <td>
                    <span><?= isset($errors['telp']) ? $errors['telp'] : '' ?></span>
                </td>
            </tr>

            Alamat: <input type="text" name="alamat"
                value="<?= isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '' ?>">
            <span>
                <?= isset($errors['alamat']) ? $errors['alamat'] : '' ?>
            </span>
            <br><br>

            <button type="submit" name="submit">Simpan</button>
            <a href="data.php"><button type="button">Kembali</button></a>
        </form>
    </table>
</body>

</html>