<?php
$errors = array(); 
$pesan_sukses = '';

$nim_value = '';
$nama_value = '';
$email_value = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim_value = trim($_POST['nim']);
    $nama_value = trim($_POST['nama']);
    $email_value = trim($_POST['email']);
    $password_value = $_POST['password']; 

    
    if (empty($nim_value)) {
        $errors['nim'] = 'NIM wajib diisi.';
    } else if (!is_numeric($nim_value)) { 
        $errors['nim'] = 'NIM harus angka.';
    }

    if (empty($nama_value)) {
        $errors['nama'] = 'Nama wajib diisi.';
    } else if (!preg_match("/^[a-zA-Z' -]+$/", $nama_value)) {
        $errors['nama'] = 'Nama hanya boleh huruf, spasi, \', dan -.';
    }
    
    if (empty($email_value)) {
        $errors['email'] = 'Email wajib diisi.';
    } elseif (!filter_var($email_value, FILTER_VALIDATE_EMAIL)) { 
        $errors['email'] = 'email tidak valid.';
    }

    if (empty($password_value)) {
        $errors['password'] = 'password wajib diisi.';
    } else if (strlen($password_value) < 8) {
        $errors['password'] = 'password minimal 8 karakter.';
    }

    if (empty($errors)) {
        $pesan_sukses = "berhasil disimpan";
        
        $nim_value = '';
        $nama_value = '';
        $email_value = '';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form > div { margin-bottom: 15px; }
        label { display: block; font-weight: bold; }
        .error { color: red; font-size: 0.8em; }
    </style>
</head>
<body>

    <h2>Form Input Data Mahasiswa</h2>

    <?php if ($pesan_sukses != '') : ?>
        <div style="color:green; padding: 10px; border: 1px solid green;">
            <?php echo $pesan_sukses; ?>
        </div>
    <?php endif; ?>

    <form action="tugas-2.php" method="POST">
        <div>
            <label>NIM:</label>
            <input type="text" name="nim" value="<?php echo htmlspecialchars($nim_value); ?>">
            
            <?php if (isset($errors['nim'])) {
                echo "<span class='error'>{$errors['nim']}</span>";
            } ?>
        </div>
        
        <div>
            <label>Nama Lengkap:</label>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($nama_value); ?>">
            
            <?php if (isset($errors['nama'])) {
                echo "<span class='error'>{$errors['nama']}</span>";
            } ?>
        </div>
        
        <div>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email_value); ?>">
            
            <?php if (isset($errors['email'])) {
                echo "<span class='error'>{$errors['email']}</span>";
            } ?>
        </div>
        
        <div>
            <label>Password (min 8 karakter):</label>
            <input type="password" name="password" value="">
            
            <?php if (isset($errors['password'])) {
                echo "<span class='error'>{$errors['password']}</span>";
            } ?>
        </div>
        
        <button type="submit">Kirim</button>
    </form>

</body>
</html>