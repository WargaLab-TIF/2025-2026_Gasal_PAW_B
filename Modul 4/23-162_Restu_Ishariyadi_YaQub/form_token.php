<?php
session_start();

$token = md5(uniqid());
$_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Token</title>
</head>
<body>
    <form method="POST" action="processData.php">
        Surname: <input type="text" name="surname" required><br><br>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <input type="submit" value="Kirim">
    </form>
</body>
</html>