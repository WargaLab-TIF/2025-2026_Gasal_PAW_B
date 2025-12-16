<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Mahasiswa</title>
</head>
<body>
<h2>Form Mahasiswa</h2>

<?php
function validateName($name) {
    return preg_match("/^[a-zA-Z' -]+$/", $name);
}
function cleanString($str) {
    $str = trim($str);
    $str = strtolower($str);
    return ucfirst($str);
}
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validateDate($date) {
    $parts = explode('-', $date);
    if (count($parts) == 3) {
        return checkdate($parts[1], $parts[2], $parts[0]);
    }
    return false;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = cleanString($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $birth = $_POST['birth'] ?? '';

    if (empty($name) || !validateName($name)) {
        $errors[] = "Nama tidak valid (hanya huruf diperbolehkan).";
    }
    if (empty($email) || !validateEmail($email)) {
        $errors[] = "Format email tidak valid.";
    }
    if (empty($birth) || !validateDate($birth)) {
        $errors[] = "Tanggal lahir tidak valid.";
    }

    if (!$errors) {
        echo "<h4>Form berhasil dikirim!</h4>";
        echo "Nama: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Tanggal Lahir: " . htmlspecialchars($birth) . "<hr>";
    }
}

if (!empty($errors)) {
    echo "<div><strong>Terjadi kesalahan:</strong><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul></div>";
}
?>

<form method="post" action="">
    <fieldset>
        <legend>Data Mahasiswa</legend>

        Nama: <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"><br><br>
        Tanggal Lahir: <input type="date" name="birth" value="<?= htmlspecialchars($_POST['birth'] ?? '') ?>"><br><br>

        <input type="submit" value="Kirim">
        <input type="reset" value="Reset">
    </fieldset>
</form>

</body>
</html>
