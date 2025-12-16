<?php
$errors = array();

if (isset($_POST['surname'])) {
    require 'validate.inc';

    validateName($errors, $_POST, 'firstname');
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');

    if ($errors) {
        echo '<h2>Invalid, perbaiki kesalahan berikut:</h2>';
        foreach ($errors as $field => $error) {
            echo "$field : $error <br>";
        }
        include 'form.inc';
    } else {
        echo '<h2>Form submitted successfully with no errors</h2>';
    }
} else {
    include 'form.inc';
}
?>