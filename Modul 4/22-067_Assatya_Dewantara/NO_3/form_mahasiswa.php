<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
</head>
<body>
    <h2>Form Data Mahasiswa</h2>
    <form action="process_mahasiswa.php" method="POST">
        Nama: <input type="text" name="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>"><br>
        Email: <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"><br>
        Password: <input type="password" name="password"><br>
        Tanggal Lahir: <input type="date" name="tgl_lahir" value="<?php echo htmlspecialchars($_POST['tgl_lahir'] ?? ''); ?>"><br>
        <input type="submit" value="Kirim">
    </form>
</body>
</html>
