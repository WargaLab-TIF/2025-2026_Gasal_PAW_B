<form method="POST" action="formMahasiswa.php">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>">
    <?php if (!empty($errors['nama'])) echo "<span style='color:red;'> {$errors['nama']}</span>"; ?>
    <br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
    <?php if (!empty($errors['email'])) echo "<span style='color:red;'> {$errors['email']}</span>"; ?>
    <br><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?php echo htmlspecialchars($_POST['nim'] ?? ''); ?>">
    <?php if (!empty($errors['nim'])) echo "<span style='color:red;'> {$errors['nim']}</span>"; ?>
    <br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tgl_lahir" value="<?php echo htmlspecialchars($_POST['tgl_lahir'] ?? ''); ?>">
    <?php if (!empty($errors['tgl_lahir'])) echo "<span style='color:red;'> {$errors['tgl_lahir']}</span>"; ?>
    <br><br>

    <label>Password:</label><br>
    <input type="password" name="password">
    <?php if (!empty($errors['password'])) echo "<span style='color:red;'> {$errors['password']}</span>"; ?>
    <br><br>

    <label>IPK:</label><br>
    <input type="text" name="ipk" value="<?php echo htmlspecialchars($_POST['ipk'] ?? ''); ?>">
    <?php if (!empty($errors['ipk'])) echo "<span style='color:red;'> {$errors['ipk']}</span>"; ?>
    <br><br>

    <input type="submit" value="Kirim">
    <input type="reset" value="Bersihkan">
</form>
