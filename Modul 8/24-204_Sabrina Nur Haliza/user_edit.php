<?php 
include 'proteksi.php';    // Cegah akses tanpa login
include 'koneksi.php';     // Koneksi database

$id = intval($_GET['id']); // Ambil id user dari URL
$q = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user=$id");
$data = mysqli_fetch_assoc($q); // Ambil data user

include 'menu.php'; // Tampilkan menu sesuai level
?>

<h2>Edit User</h2>
<a href="user.php">Kembali</a>
<br><br>

<!-- Form update user -->
<form action="user_edit_proses.php" method="post">

    <!-- Kirim ID user secara hidden -->
    <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">

    Username : <br>
    <input type="text" name="username" value="<?= htmlspecialchars($data['username']); ?>" required><br><br>

    Password (isi jika ingin mengubah): <br>
    <input type="password" name="password"><br><br>

    Nama : <br>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required><br><br>

    Alamat : <br>
    <textarea name="alamat" required><?= htmlspecialchars($data['alamat']); ?></textarea><br><br>

    HP : <br>
    <input type="text" name="hp" value="<?= htmlspecialchars($data['hp']); ?>" required><br><br>

    Level : <br>
    <select name="level" required>
        <option value="1" <?= $data['level']==1?'selected':''; ?>>1</option>
        <option value="2" <?= $data['level']==2?'selected':''; ?>>2</option>
    </select>
    <br><br>

    <button type="submit">Update</button>
</form>
