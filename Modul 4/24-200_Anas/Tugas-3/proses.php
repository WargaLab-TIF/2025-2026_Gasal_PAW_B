<?php
if (!isset($_POST['submit'])) {
    header("Location: index.html");
    exit();
}


$errors = [];
$data = [];


function clean_input($data) {
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data;
}


$nama = clean_input($_POST['nama'] ?? '');
$nim = clean_input($_POST['nim'] ?? '');
$email = clean_input($_POST['email'] ?? '');
$password = $_POST['password'] ?? ''; 


$data['nama'] = $nama;
$data['nim'] = $nim;
$data['email'] = $email;



if (empty($nama)) {
    $errors['nama'] = "Nama wajib diisi.";
} 

if (empty($nim)) {
    $errors['nim'] = "NIM wajib diisi.";
} elseif (!preg_match("/^[0-9]+$/", $nim)) { 
    $errors['nim'] = "NIM harus berupa angka saja.";
}


if (empty($email)) {
    $errors['email'] = "Email wajib diisi.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
    $errors['email'] = "Format email tidak valid (contoh: user@mail.com).";
} 

$min_length = 8;
if (empty($password)) {
    $errors['password'] = "Password wajib diisi.";
} elseif (strlen($password) < $min_length) { 
    $errors['password'] = "Password minimal harus {$min_length} karakter.";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Validasi Data Mahasiswa</title>
</head>
<body>
    <h1>Hasil Validasi Data Mahasiswa</h1>
    
    <?php if (count($errors) > 0): ?>
        <h2>Validasi Gagal:</h2>
        <p>Terdapat <?php echo count($errors); ?> kesalahan input. Silakan periksa detail di bawah:</p>
        
        <div style="border: 1px solid red; padding: 15px; background-color: #ffeaea;">
            <ul>
                <?php foreach ($errors as $field => $error): ?>
                    <li>Bidang <?php echo ucfirst($field); ?>: <span style="color: red;"><?php echo $error; ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <p><a href="index.html">Kembali ke Formulir</a></p> 
    <?php else: 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    ?>
        <h2>Validasi Berhasil!</h2>
        <p>Semua data valid dan siap diproses.</p>
        
        <div style="border: 1px solid green; padding: 15px; background-color: #efffe7;">
            <h3>Data Mahasiswa:</h3>
            <p><strong>Nama:</strong> <?php echo $data['nama']; ?></p>
            <p><strong>NIM:</strong> <?php echo $data['nim']; ?></p>
            <p><strong>Email:</strong> <?php echo $data['email']; ?></p>
            <p><strong>Password (Hashed):</strong> <?php echo $hashed_password; ?></p>
            <p>(Password asli tidak ditampilkan untuk alasan keamanan)</p>
        </div> 
    <?php endif; ?>
</body>
</html>