<?php
require_once 'koneksi.php';


function clearText($text) {
    return htmlspecialchars(stripslashes(trim($text)));
}

if ($_SERVER['REQUEST_METHOD'] == "POST")  {
    $errors = array();
    $nama = isset($_POST['nama']) ? clearText($_POST['nama']) : "";
    $telp = isset($_POST['telp']) ? clearText($_POST['telp']) : "";
    $alamat = isset($_POST['alamat']) ? clearText($_POST['alamat']) : "";
    if (!$nama || !$telp || !$alamat ) {
        $errors[] = "Pastikan Mengisi Semua Data";
    }
    $regex = "/^(\+62|08)/";
    if (!preg_match($regex, $telp)) {
        $errors[] = "Nomor Telepon Tidak Sesuai ( ID )";
    }

    if ($errors != []) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>" ;
       
        }
    } else {
        $SQL = "INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)";
        $stmp = $conn->prepare($SQL);
        $stmp->bind_param("sss",$nama,$telp,$alamat);
        $stmp->execute();
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="colors_agak_mirip.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        span {
            display: inline-block;
            width: 100px;
            text-align: right;
        }
        input {
            margin-right: 50px;
        }
    </style >
</head>

<body>
    <div class="header">
        <h1 style="color: var(--primary-text);">Tambah Data Master Supplier</h1>
    </div>
    <div style="display: flex; justify-content: center;">
        <form action="" method="post">
            <div class="">
                <label for="nama"><span>Nama</span></label>
                <input type="text" name="nama" id="nama" placeholder="Nama">
            </div>
            <div class="">
                <label for="telp"><span>Telp</span></label>
                <input type="text" name="telp" id="telp" placeholder="Telp">
            </div>
            <div class="">
                <label for="alamat"><span>Alamat</span></label>
                <input type="text" name="alamat" id="alamat" placeholder="Alamat">
            </div>
            <div class="">
                <span></span>
                <button class="btn btn-green">Simpan</button>
                <a href="index.php" class="btn btn-red">Batal</a>
            </div>
        </form>
    </div>

    <script>
        function simpan() {
            
        }
    </script>
</body>

</html>