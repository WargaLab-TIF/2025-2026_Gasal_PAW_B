<?php
// form.inc
// Fungsi untuk menampilkan form input data
function displayForm($nama, $alamat, $email, $gender, $tanggal_lahir, $password, $errors) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #d7d3f0;
    }
    form {
        background-color: #fff;
        padding: 20px 30px;
        border-radius: 8px;
        width: 400px;
        margin: 40px auto;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    h1 {
        text-align: center;
    }
    label {
        display: inline-block;
        width: 140px;
        vertical-align: top;
    }
    input[type="text"], input[type="email"], input[type="password"], textarea, select {
        width: 200px;
        padding: 5px;
        margin-bottom: 10px;
    }
    .error {
        color: red;
        font-size: 0.9em;
    }
    input[type="submit"], input[type="reset"] {
        background-color: #a89ff1;
        border: none;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #8f86e3;
    }
</style>
</head>
<body>

<h1>Register</h1>

<!-- (No. 7 & 8) Form input dengan validasi server-side -->
<form method="post" action="tugas1.php">

    <!-- Input Nama -->
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br>
    <?php if (isset($errors['nama'])) echo "<div class='error'>{$errors['nama']}</div>"; ?>

    <!-- Input Alamat -->
    <label>Alamat:</label>
    <textarea name="alamat"><?= htmlspecialchars($alamat) ?></textarea><br>
    <?php if (isset($errors['alamat'])) echo "<div class='error'>{$errors['alamat']}</div>"; ?>

    <!-- Input Email -->
    <label>Email:</label>
    <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
    <?php if (isset($errors['email'])) echo "<div class='error'>{$errors['email']}</div>"; ?>

    <!-- Input Password -->
    <label>Password:</label>
    <input type="password" name="password" value="<?= htmlspecialchars($password) ?>"><br>
    <?php if (isset($errors['password'])) echo "<div class='error'>{$errors['password']}</div>"; ?>

    <!-- Input Jenis Kelamin -->
    <label>Jenis Kelamin:</label>
    <input type="radio" name="gender" value="Laki-laki" <?= $gender=="Laki-laki"?"checked":"" ?>>Laki-laki
    <input type="radio" name="gender" value="Perempuan" <?= $gender=="Perempuan"?"checked":"" ?>>Perempuan<br>
    <?php if (isset($errors['gender'])) echo "<div class='error'>{$errors['gender']}</div>"; ?>

    <!-- Input Tanggal Lahir -->
    <label>Tanggal Lahir:</label>
    <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($tanggal_lahir) ?>"><br>
    <?php if (isset($errors['tanggal_lahir'])) echo "<div class='error'>{$errors['tanggal_lahir']}</div>"; ?>

    <br>
    <input type="submit" value="Kirim">
    <input type="reset" value="Reset">
</form>

</body>
</html>
<?php
}
?>
