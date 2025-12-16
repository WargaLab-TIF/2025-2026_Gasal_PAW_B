<?php
require 'koneksi.php';

$errors = [];
$id = isset($_GET['id']) ? $_GET['id'] : '';
$nama = '';
$telp = '';
$alamat = '';

if ($id) {
    $data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
    if ($row = mysqli_fetch_assoc($data)) {
        $nama = $row['nama'];
        $telp = $row['telp'];
        $alamat = $row['alamat'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nama'])) {
        $errors[] = 'Nama harus diisi';
    } else {
        $nama = $_POST['nama'];
    }

    if (empty($_POST['telp'])) {
        $errors[] = 'Nomor Telepon harus diisi';
    } else {
        $telp = $_POST['telp'];
    }

    if (empty($_POST['alamat'])) {
        $errors[] = 'Alamat harus diisi';
    } else {
        $alamat = $_POST['alamat'];
    }

    if (empty($errors)) {
        header('Location: proses_edit.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Supplier</title>

<style>
.container { width: 90%; margin: auto; font-family: Arial; }
h2 { color:#2a6ebb; margin-bottom:5px; }

.title-line {
    border: none;
    border-bottom: 1px solid #ccc;
    margin-bottom: 20px;
}

label { width:120px; display:inline-block; margin-bottom:10px; font-weight:bold; }
input, textarea {
    width: 300px;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button { padding:7px 14px; border:none; cursor:pointer; border-radius:4px; }
.btn-update { background:#4CAF50; color:white; }
.btn-cancel { background:#f44336; color:white; }

.error-message {
    background: #ffebee;
    color: #c62828;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 14px;
}

.error-message ul {
    margin: 0;
    padding-left: 20px;
}
</style>

</head>
<body>

<div class="container">

<h2>Edit Data Master Supplier</h2>
<hr class="title-line">

<?php if (!empty($errors)): ?>
    <div class="error-message">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="POST">
<input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

<label>Nama</label>
<input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br>

<label>Telp</label>
<input type="text" name="telp" value="<?= htmlspecialchars($telp) ?>"><br>

<label>Alamat</label>
<input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>"><br>

<button type="submit" class="btn-update">Update</button>
<a href="index.php"><button type="button" class="btn-cancel">Batal</button></a>

</form>

</div>

</body>
</html>
