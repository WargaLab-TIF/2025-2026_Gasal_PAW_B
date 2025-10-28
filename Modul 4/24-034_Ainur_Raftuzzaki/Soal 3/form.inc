<form method="POST" action="formValidation.php">
    <label>Nama:</label><br>
    <input type="text" name="Nama" value="<?= isset($_POST['Nama']) ? htmlspecialchars($_POST['Nama']) : '' ?>"><br>
    <span style="color:red;"><?= $errors['Nama'] ?? '' ?></span><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"><br>
    <span style="color:red;"><?= $errors['email'] ?? '' ?></span><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <span style="color:red;"><?= $errors['password'] ?? '' ?></span><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal" value="<?= isset($_POST['tanggal']) ? htmlspecialchars($_POST['tanggal']) : '' ?>"><br>
    <span style="color:red;"><?= $errors['tanggal'] ?? '' ?></span><br>

    <input type="submit" value="Kirim">
</form>