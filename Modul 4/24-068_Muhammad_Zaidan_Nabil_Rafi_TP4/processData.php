<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Pribadi</title>
</head>
<body>
<h2>Hasil Isian Data Pribadi</h2>
<?php
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$state = $_POST['state'];
$country = $_POST['country'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : 'Tidak dipilih';
$vegetarian = isset($_POST['vegetarian']) ? 'Yes' : 'No';

echo "<strong>Surname:</strong> $surname<br>";
echo "<strong>Email Address:</strong> $email<br>";
echo "<strong>Password:</strong> $password<br>";
echo "<strong>Street Address:</strong> $address<br>";
echo "<strong>State:</strong> $state<br>";
echo "<strong>Country:</strong> $country<br>";
echo "<strong>Gender:</strong> $gender<br>";
echo "<strong>Vegetarian:</strong> $vegetarian<br>";
?>
</body>
</html>