<?php 
include 'proteksi.php';   // Cek apakah sudah login
include 'koneksi.php';    // Hubungkan ke database

// Hanya level 1 (admin) yang boleh membuka Data User
if ($_SESSION['level'] != 1) {
    header('Location: home.php');
    exit;
}

include 'menu.php';       // Tampilkan menu navigasi
?>
<h2>Data User</h2>

<!-- Tombol tambah user -->
<a href="user_tambah.php">Tambah User</a>
<br><br>

<!-- Tabel data user -->
<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>HP</th>
    <th>Level</th>
    <th>Aksi</th>
</tr>

<?php
// Ambil semua data user
$q = mysqli_query($koneksi, "SELECT * FROM user");

// Loop untuk menampilkan tiap baris
while ($d = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $d['id_user']; ?></td>
    <td><?= htmlspecialchars($d['username']); ?></td>
    <td><?= htmlspecialchars($d['nama']); ?></td>
    <td><?= htmlspecialchars($d['alamat']); ?></td>
    <td><?= htmlspecialchars($d['hp']); ?></td>
    <td><?= $d['level']; ?></td>
    <td>
        <!-- Aksi edit dan hapus -->
        <a href="user_edit.php?id=<?= $d['id_user']; ?>">Edit</a> |
        <a href="user_hapus.php?id=<?= $d['id_user']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>
