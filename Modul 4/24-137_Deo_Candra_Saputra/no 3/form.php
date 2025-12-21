<?php
// soal 3.8
$errors = [];
$data = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data['nama']       = trim($_POST['nama']);
    $data['nim']        = trim($_POST['nim']);
    $data['email']      = strtolower(trim($_POST['email']));
    $data['password']   = $_POST['password'];
    $data['tgl_lahir']  = $_POST['tgl_lahir'];
    $data['ipk']        = trim($_POST['ipk']);

    if (empty($data['nama'])) {
        $errors['nama'] = "Nama wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z\s'-]+$/", $data['nama'])) {
        $errors['nama'] = "Nama hanya boleh berisi huruf dan spasi.";
    }

    if (empty($data['nim'])) {
        $errors['nim'] = "NIM wajib diisi.";
    } elseif (!is_numeric($data['nim'])) {
        $errors['nim'] = "NIM harus berupa angka.";
    } elseif (strlen($data['nim']) < 8 || strlen($data['nim']) > 12) {
        $errors['nim'] = "NIM harus terdiri dari 8–12 digit.";
    }

    if (empty($data['email'])) {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    } elseif (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/", $data['email'])) {
        $errors['email'] = "Email tidak sesuai pola standar.";
    }

    if (empty($data['password'])) {
        $errors['password'] = "Password wajib diisi.";
    } elseif (strlen($data['password']) < 8) {
        $errors['password'] = "Password minimal 8 karakter.";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[a-z]).+$/", $data['password'])) {
        $errors['password'] = "Password harus mengandung huruf besar, kecil, dan angka.";
    }

    if (empty($data['tgl_lahir'])) {
        $errors['tgl_lahir'] = "Tanggal lahir wajib diisi.";
    } else {
        list($tahun, $bulan, $tanggal) = explode('-', $data['tgl_lahir']);
        if (!checkdate($bulan, $tanggal, $tahun)) {
            $errors['tgl_lahir'] = "Tanggal lahir tidak valid.";
        }
    }

    if (empty($data['ipk'])) {
        $errors['ipk'] = "IPK wajib diisi.";
    } elseif (!is_numeric($data['ipk']) || $data['ipk'] < 0 || $data['ipk'] > 4) {
        $errors['ipk'] = "IPK harus antara 0.00 - 4.00.";
    }

    if (empty($errors)) {
        echo "<h2> Data Mahasiswa Valid!</h2>";
        echo "<div style='background:#eef;padding:10px;border-radius:5px;width:400px'>";
        foreach ($data as $key => $value) {
            echo "<p><strong>" . ucfirst($key) . ":</strong> " . htmlspecialchars($value) . "</p>";
        }
        echo "</div>";
        exit;
    }
}
?>
<!-- soal 3.7 -->
<h2>Form Input Data Mahasiswa</h2>

<form method="POST" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama'] ?? '') ?>">
    <span style="color:red"><?= $errors['nama'] ?? '' ?></span><br><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?= htmlspecialchars($data['nim'] ?? '') ?>">
    <span style="color:red"><?= $errors['nim'] ?? '' ?></span><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($data['email'] ?? '') ?>">
    <span style="color:red"><?= $errors['email'] ?? '' ?></span><br><br>

    <label>Password:</label><br>
    <input type="password" name="password">
    <span style="color:red"><?= $errors['password'] ?? '' ?></span><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tgl_lahir" value="<?= htmlspecialchars($data['tgl_lahir'] ?? '') ?>">
    <span style="color:red"><?= $errors['tgl_lahir'] ?? '' ?></span><br><br>

    <label>IPK:</label><br>
    <input type="text" name="ipk" value="<?= htmlspecialchars($data['ipk'] ?? '') ?>">
    <span style="color:red"><?= $errors['ipk'] ?? '' ?></span><br><br>

    <input type="submit" value="Kirim Data">
</form>
