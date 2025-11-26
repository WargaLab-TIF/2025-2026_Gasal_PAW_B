<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;

$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id");
$data = mysqli_fetch_assoc($result);

if (!$data) die("Data tidak ditemukan!");

$username = $data['username'];
$nama = $data['nama'];
$role = $data['role'];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $nama = trim($_POST["nama"]);
    $role = trim($_POST["role"]);
    $password = trim($_POST["password"]);

    if ($username == "") $errors['username'] = "Username wajib diisi.";
    if ($nama == "") $errors['nama'] = "Nama wajib diisi.";
    if ($role == "") $errors['role'] = "Role wajib dipilih.";

    if (empty($errors)) {

        if ($password != "") {
            $pass = md5($password);
            $query = "UPDATE user SET 
                        username='$username',
                        nama='$nama',
                        role='$role',
                        password='$pass'
                      WHERE id_user=$id";
        } else {
            $query = "UPDATE user SET 
                        username='$username',
                        nama='$nama',
                        role='$role'
                      WHERE id_user=$id";
        }

        mysqli_query($conn, $query);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h3>Edit User</h3>

    <form method="post">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($username) ?>">
            <small class="text-danger"><?= $errors['username'] ?? '' ?></small>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($nama) ?>">
            <small class="text-danger"><?= $errors['nama'] ?? '' ?></small>
        </div>

        <div class="mb-3">
            <label>Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="">-- Pilih Role --</option>
                <option value="1" <?= ($role == '1' ? 'selected' : '') ?>>Admin</option>
                <option value="2" <?= ($role == '2' ? 'selected' : '') ?>>User</option>
            </select>
            <small class="text-danger"><?= $errors['role'] ?? '' ?></small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="master1.php" class="btn btn-secondary">Batal</a>

    </form>

</body>
</html>
