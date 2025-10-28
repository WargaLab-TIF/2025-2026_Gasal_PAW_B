<?php
$errors = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';

   
    validateNama($errors, $_POST, 'nama');
    validateNIM($errors, $_POST, 'nim');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

   
    if (empty($errors)) {
        echo "<h2 style='color:green;'>Data Mahasiswa Berhasil Dikirim!</h2>";
        echo "<p><b>Nama:</b> " . htmlspecialchars($_POST['nama']) . "</p>";
        echo "<p><b>NIM:</b> " . htmlspecialchars($_POST['nim']) . "</p>";
        echo "<p><b>Email:</b> " . htmlspecialchars($_POST['email']) . "</p>";
    }
}
?>

<h2>Form Input Data Mahasiswa</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo $_POST['nama'] ?? ''; ?>"><br>
    <span style="color:red;"><?php echo $errors['nama'] ?? ''; ?></span><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?php echo $_POST['nim'] ?? ''; ?>"><br>
    <span style="color:red;"><?php echo $errors['nim'] ?? ''; ?></span><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"><br>
    <span style="color:red;"><?php echo $errors['email'] ?? ''; ?></span><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <span style="color:red;"><?php echo $errors['password'] ?? ''; ?></span><br><br>

    <input type="submit" value="Kirim">
</form>
