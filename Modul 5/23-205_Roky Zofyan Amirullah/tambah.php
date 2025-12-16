<?php
include 'koneksi.php';

$nama = "";
$telp = "";
$alamat = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);
    
    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }
    
    if (empty($telp)) {
        $errors[] = "Telp tidak boleh kosong.";
    } elseif (!is_numeric($telp)) {
        $errors[] = "Telp harus berupa angka.";
    } elseif (strlen($telp) < 9 || strlen($telp) > 13) {
        $errors[] = "Nomor Telp harus valid (9-13 digit).";
    }
    
    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong.";
    }

    if (empty($errors)) {
        
        $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $nama, $telp, $alamat);
            
            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.php?status=tambah_sukses");
                exit();
            } else {
                $errors[] = "Gagal menyimpan ke database: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Supplier</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        h2 { margin-left: 10px; }
        .error { 
            color: #721c24; 
            background-color: #f8d7da; 
            border: 1px solid #f5c6cb; 
            padding: 10px; 
            border-radius: 4px; 
            margin-bottom: 15px;
            width: 400px;
        }
        form table { margin-top: 15px; }
        form table td { padding: 5px 10px; }
        input[type="text"], textarea {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Important */
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
        }
        .btn-simpan {
            background-color: #28a745; /* Hijau */
        }
        .btn-batal {
            background-color: #dc3545; /* Merah */
        }
    </style>
</head>
<body>

    <h2>Tambah Data Master Supplier Baru</h2>

    <?php
    if (!empty($errors)) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo "<p>- $error</p>";
        }
        echo '</div>';
    }
    ?>

    <form method="POST" action="tambah.php">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telp" value="<?php echo htmlspecialchars($telp); ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" required><?php echo htmlspecialchars($alamat); ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Simpan" class="btn btn-simpan">
                    <a href="index.php" class="btn btn-batal">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>