<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>

    <?php
    if (!empty($errors)) {
        echo "<div style='color:red;'><b>Terjadi Kesalahan:</b><br/>";
        foreach ($errors as $field => $error) {
            echo ucfirst($field) . " : " . htmlspecialchars($error) . "<br/>";
        }
        echo "</div><br/>";
    }
    ?>

    <form method="POST" action="">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>"><br>
        <br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"><br>
        <br>

        <label>NIM:</label><br>
        <input type="text" name="nim" value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>"><br>
        <br>

        <label>Password:</label><br>
        <input type="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? '') ?>"><br>
        <br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tgl_lahir" value="<?= htmlspecialchars($_POST['tgl_lahir'] ?? '') ?>"><br>
        <br>

        <input type="submit" value="Kirim">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
