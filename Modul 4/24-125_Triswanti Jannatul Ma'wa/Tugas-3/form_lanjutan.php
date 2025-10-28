<?php
$namaErr = $nimErr = $emailErr = $passwordErr = "";
$nama = $nim = $email = $password = "";
$successMsg = "";

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
            $nimErr = "NIM harus 8–10 digit angka!";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email harus diisi!";
    } else {
        $email = trim($_POST["email"]);
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/", $email)) {
            $emailErr = "Format email tidak valid!";
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password harus diisi!";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 6) {
            $passwordErr = "Password minimal 6 karakter!";
        } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/", $password)) {
            $passwordErr = "Password harus mengandung huruf besar, kecil, dan angka!";
        }
    }
    if ($namaErr == "" && $nimErr == "" && $emailErr == "" && $passwordErr == "") {
        $successMsg = "Data mahasiswa berhasil dikirim tanpa error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Validasi Lanjutan Data Mahasiswa</title>
</head>
<body>

<h2>Form Input Data Mahasiswa (Dengan Validasi Lanjutan)</h2>

<form method="post" action="">
    Nama: <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br>
    <span class="error"><?= $namaErr ?></span><br>

    NIM: <input type="text" name="nim" value="<?= htmlspecialchars($nim) ?>"><br>
    <span class="error"><?= $nimErr ?></span><br>

    Email: <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
    <span class="error"><?= $emailErr ?></span><br>

    Password: <input type="password" name="password"><br>
    <span class="error"><?= $passwordErr ?></span><br>

    <input type="submit" value="Kirim">
</form>

<?php if ($successMsg): ?>
    <p class="success"><?= $successMsg ?></p>
<?php endif; ?>

</body>
</html>
