<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pabrik"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = null;
$nama = $telp = $alamat = "";
$pesan_error = "";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
} else if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
} else {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_baru = $_POST['nama'];
    $telp_baru = $_POST['telp'];
    $alamat_baru = $_POST['alamat'];

    if (!empty($nama_baru) && !empty($telp_baru) && !empty($alamat_baru)) {
        
        $stmt_update = $conn->prepare("UPDATE supplier SET nama = ?, telp = ?, alamat = ? WHERE id = ?");
        $stmt_update->bind_param("sssi", $nama_baru, $telp_baru, $alamat_baru, $id); 

        if ($stmt_update->execute()) {
            header("Location: index.php?status=sukses_edit");
            exit();
        } else {
            $pesan_error = "Gagal memperbarui data: " . $stmt_update->error;
        }

        $stmt_update->close();
    } else {
        $pesan_error = "Semua kolom harus diisi.";
    }
}

$stmt_select = $conn->prepare("SELECT nama, telp, alamat FROM supplier WHERE id = ?");
$stmt_select->bind_param("i", $id); 
$stmt_select->execute();
$result = $stmt_select->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $telp = $row['telp'];
    $alamat = $row['alamat'];
} else {
    header("Location: index.php?status=data_tidak_ditemukan");
    exit();
}

$stmt_select->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
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
    <h2>Edit Data Master Supplier</h2>

    <?php 
    if (!empty($pesan_error)) {
        echo '<div class="alert">' . htmlspecialchars($pesan_error) . '</div>';
    } 
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
        </div>

        <div class="form-group">
            <label for="telp">Telp</label>
            <input type="text" id="telp" name="telp" value="<?php echo htmlspecialchars($telp); ?>" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($alamat); ?>" required>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn">Update</button>
            <a href="index.php" class="btn">Batal</a>
        </div>
    </form>

</div>
</body>
</html>