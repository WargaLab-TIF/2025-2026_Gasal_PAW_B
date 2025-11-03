<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validateinc.php';
 
    validateName($errors, $_POST);
    validateEmail($errors, $_POST);
    validatePassword($errors, $_POST);

    if ($errors) {
        echo "<h3 style='color:red'>Please correct the following errors:</h3>";
        include 'forminc.php';
    } else {
        echo "<h3 style='color:green'>Form submitted successfully!</h3>";
        echo "Surname: " . $_POST['surname'] . "<br>";
        echo "Email: " . $_POST['email'] . "<br>";
    }
} else {
    include 'forminc.php';
}
?>
