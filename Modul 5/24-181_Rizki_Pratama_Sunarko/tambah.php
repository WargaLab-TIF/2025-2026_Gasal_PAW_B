<?php
$errors = [];
$nama = '';
$telp = '';
$alamat = '';

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
        header('Location: proses_tambah.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Supplier</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 90%;
        margin: 30px auto;
    }

    h2 {
        color: #2a6ebb;
        margin-bottom: 5px;
        font-weight: bold;
        font-size: 22px;
    }

    hr {
        border: 0;
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
    }

    label {
        width: 120px;
        display: inline-block;
        margin-bottom: 10px;
        font-weight: bold;
        font-size: 14px;
        text-align: left;
    }

    input {
        width: 300px;
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    button {
        padding: 7px 20px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 14px;
        margin-right: 5px;
    }

    .btn-save {
        background: #4CAF50;
        color: white;
    }

    .btn-cancel {
        background: #d9534f;
        color: white;
    }

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

<h2>Tambah Data Master Supplier Baru</h2>
<hr>

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

<div>
<label>Nama</label>
<input type="text" name="nama" placeholder="nama" value="<?php echo htmlspecialchars($nama); ?>">
</div>

<div>
<label>Telp</label>
<input type="text" name="telp" placeholder="telp" value="<?php echo htmlspecialchars($telp); ?>">
</div>

<div>
<label>Alamat</label>
<input type="text" name="alamat" placeholder="alamat" value="<?php echo htmlspecialchars($alamat); ?>">
</div>

<div style="margin-top: 10px;">
<button type="submit" class="btn-save">Simpan</button>
<a href="index.php"><button type="button" class="btn-cancel">Batal</button></a>
</div>

</form>

</div>

</body>
</html>
