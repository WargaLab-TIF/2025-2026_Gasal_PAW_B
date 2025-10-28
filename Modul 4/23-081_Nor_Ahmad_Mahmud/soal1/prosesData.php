<?php
require 'validate.inc';

$nama = "";
$email = "";
$surnameErr = "";
$emailErr = "";
$successMsg = "";

function bersihkan($text){
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $errors = array();

    $nama = bersihkan($_POST['nama']);
    $email = bersihkan($_POST['email']);
    
    validateName($errors, $_POST, 'nama');
    
    if (isset($errors['nama'])) {
        if ($errors['nama'] == 'required') {
            $surnameErr = "Nama tidak boleh kosong.";
        } elseif ($errors['nama'] == 'invalid') {
            $surnameErr = "Format nama tidak valid. Hanya huruf, apostrof ('), dan tanda hubung (-) yang diperbolehkan.";
        }
    }
    
    // Validasi email
    if (empty($email)) {
        $emailErr = "Email tidak boleh kosong.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $emailErr = "Format email tidak valid.";
    }
    
    if (empty($surnameErr) && empty($emailErr)) {
        $successMsg = "Data berhasil divalidasi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi</title>
</head>
<body>
    <h2>Form Validasi Data</h2>
    
    <p><strong>Petunjuk:</strong><br>
    - Nama: Hanya huruf, apostrof ('), dan tanda hubung (-)<br>
    - Email: Format email yang valid (contoh: user@example.com)</p>
    
    <?php if (!empty($successMsg)): ?>
        <p style="color: green;"><strong><?php echo $successMsg; ?></strong></p>
    <?php endif; ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nama">Nama (Surname):</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>"><br>
        <span style="color: red;"><?php echo $surnameErr; ?></span><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
        <span style="color: red;"><?php echo $emailErr; ?></span><br><br>
        
        <button type="submit" name="Submit">Submit</button>
    </form>
</body>
</html>