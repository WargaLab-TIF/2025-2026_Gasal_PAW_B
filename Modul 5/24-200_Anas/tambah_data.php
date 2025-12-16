<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pabrik"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$pesan_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    if (!empty($nama) && !empty($telp) && !empty($alamat)) {
        
        $stmt = $conn->prepare("INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $telp, $alamat); 

        if ($stmt->execute()) {
            header("Location: index.php?status=sukses_tambah");
            exit();
        } else {
            $pesan_error = "Gagal menyimpan data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $pesan_error = "Semua kolom harus diisi.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Supplier</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 500px;
            margin: 20px auto;
            padding: 10px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex; 
            align-items: center;
        }
        label {
            width: 100px; 
            padding-right: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            flex-grow: 1; 
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn-group {
            margin-top: 20px;
        }
        .btn {
            padding: 8px 15px;
            text-decoration: none;
            border: 1px solid #000;
            color: #000;
            cursor: pointer;
            background-color: #eee;
            margin-right: 10px;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #ccc;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #e74c3c;
            color: #e74c3c;
            background-color: #fdd;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Data Master Supplier Baru</h2>

    <?php 
    if (!empty($pesan_error)) {
        echo '<div class="alert">' . htmlspecialchars($pesan_error) . '</div>';
    } 
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Nama Supplier" required>
        </div>

        <div class="form-group">
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp" placeholder="Nomor Telepon" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" placeholder="Alamat Lengkap" required>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn">Simpan</button>
            <a href="index.php" class="btn">Batal</a>
        </div>
    </form>

</div>
</body>
</html>