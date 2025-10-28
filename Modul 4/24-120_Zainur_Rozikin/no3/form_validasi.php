<?php
$email = $password = "";
$emailErr = $passErr = "";
$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi!";
        $valid = false;
    } else {
        $email = trim($_POST["email"]);
        if (!preg_match("/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
            $emailErr = "Format email tidak valid!";
            $valid = false;
        }
    }

    if (empty($_POST["password"])) {
        $passErr = "Password wajib diisi!";
        $valid = false;
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 8) {
            $passErr = "Password minimal 8 karakter!";
            $valid = false;
        }
    }

    if ($valid) {
        echo "<h3>Data Berhasil Divalidasi</h3>";
        echo "Email: $email <br>";
        echo "Password: " . str_repeat("*", strlen($password));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi Form PHP</title>
</head>
<body>
    <h2>Form Login Mahasiswa</h2>
    <form method="post" action="">
        Email: <br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span style="color:red"><?php echo $emailErr; ?></span><br><br>

        Password: <br>
        <input type="password" name="password">
        <span style="color:red"><?php echo $passErr; ?></span><br><br>

        <input type="submit" value="Kirim">
    </form>
</body>
</html>
