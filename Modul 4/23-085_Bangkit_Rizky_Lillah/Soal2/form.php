<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';
    
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if ($errors) {
        include 'form.inc';
    } else {
        echo "<h2>Form Telah Sukses Terkirim, Dengan Tanpa Error!</h2>";
        echo "<b>Surname:</b> " . htmlspecialchars($_POST['surname']) . "<br>";
        echo "<b>Email:</b> " . htmlspecialchars($_POST['email']) . "<br>";
        echo "<b>State:</b> " . htmlspecialchars($_POST['state']) . "<br>";
        echo "<b>Country:</b> " . htmlspecialchars($_POST['country']) . "<br>";
        echo "<b>Gender:</b> " . htmlspecialchars($_POST['gender']) . "<br>";
        if (isset($_POST['vegetarian'])) echo "<b>Vegetarian:</b> Yes<br>";
    }
} else {
    include 'form.inc';
}
?>
