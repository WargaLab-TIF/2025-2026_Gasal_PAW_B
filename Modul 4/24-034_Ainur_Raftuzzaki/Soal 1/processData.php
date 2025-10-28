<?php
require 'validate.inc';

$errors = array();

validateName($errors, $_POST, 'Nama');

if ($errors) {
    echo 'Errors:<br/>';
    foreach ($errors as $field => $error) {
        echo "$field $error<br/>";
    }
} 
else {
    echo 'Data OK!';
}

$errors = [];

if (empty($_POST["Nama"])) {
    $errors[] = "Nama tidak boleh kosong.";
}
if (empty($_POST["email"])) {
    $errors[] = "Email tidak boleh kosong.";
} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}
if (empty($_POST["password"])) {
    $errors[] = "Password tidak boleh kosong.";
}

if (!empty($errors)) {
    echo "<h3>Terjadi Kesalahan:</h3>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo '<a href="processData_form.html">Kembali ke Form</a>';
    exit;
}

echo "<h2>Hasil Data Form:</h2>";
echo "<table border='1' cellpadding='6'>";

foreach ($_POST as $key => $value) {
    if ($key == "vegetarian" && $value != "Yes") $value = "No";
    echo "<tr><td><strong>" . ucfirst($key) . "</strong></td><td>" . htmlspecialchars($value) . "</td></tr>";
}
echo "</table>";
?>