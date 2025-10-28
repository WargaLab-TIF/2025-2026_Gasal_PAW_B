<form action="" method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>"><br><br>

    <label>NIM:</label><br>
    <input type="text" name="nim" value="<?php echo htmlspecialchars($_POST['nim'] ?? ''); ?>"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal" value="<?php echo htmlspecialchars($_POST['tanggal'] ?? ''); ?>"><br><br>

    <label>IPK:</label><br>
    <input type="text" name="ipk" value="<?php echo htmlspecialchars($_POST['ipk'] ?? ''); ?>"><br><br>

    <input type="submit" value="Kirim">
    <input type="reset" value="Reset">
</form>