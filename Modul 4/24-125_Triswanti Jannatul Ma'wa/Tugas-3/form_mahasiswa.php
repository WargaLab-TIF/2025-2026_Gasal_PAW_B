<?php
$namaErr = $nimErr = $emailErr = "";
$nama = $nim = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nama"])) {
        $namaErr = "Nama harus diisi!";
    } else {
        $nama = trim($_POST["nama"]);
        if (!preg_match("/^[a-zA-Z\s'-]+$/", $nama)) {
            $namaErr = "Nama hanya boleh huruf dan spasi!";
        }
    }

    if (empty($_POST["nim"])) {
        $nimErr = "NIM harus diisi!";
    } else {
        $nim = trim($_POST["nim"]);
        if (!preg_match("/^[0-9]{8,10}$/", $nim)) {
            $nimErr = "NIM harus 8-10 digit angka!";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi!";
    } else {
        $email = trim($_POST["email"]);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Mahasiswa</title>
</head>
<body>

<h2>Form Input Data Mahasiswa</h2>

<form method="post" action="">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br>
    <span class="error"><?= $namaErr ?></span><br>

    NIM: <input type="text" name="nim" value="<?= htmlspecialchars($nim) ?>"><br>
    <span class="error"><?= $nimErr ?></span><br>

    Email: <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
    <span class="error"><?= $emailErr ?></span><br>

    <input type="submit" value="Kirim">
</form>

</body>
</html>
