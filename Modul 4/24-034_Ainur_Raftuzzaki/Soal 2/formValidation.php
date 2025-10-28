<?php
$errors = array();

if (isset($_POST['Nama'])) {
    require 'validate.inc';

    validateName($errors, $_POST, 'Nama');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if (empty($_POST['Alamat'])) {
        $errors['Alamat'] = 'required';
    }

    if (empty($_POST['state'])) {
        $errors['state'] = 'required';
    }

    if (empty($_POST['Jenis_Kelamin'])) {
        $errors['Jenis_Kelamin'] = 'required';
    }

    if ($errors) {
        echo '<h2>Invalid, correct the following errors:</h2>';
        foreach ($errors as $field => $error) {
            echo "<b>$field:</b> $error<br>";
        }

        include 'form.inc';
    } else {
        echo '<h2>Form submitted successfully with no errors</h2>';

        echo '<table border="1" cellpadding="6">';
        foreach ($_POST as $key => $value) {
            if ($key == "vegetarian" && $value != "Yes") $value = "No";
            echo "<tr><td><b>" . htmlspecialchars($key) . "</b></td><td>" . htmlspecialchars($value) . "</td></tr>";
        }
        echo '</table>';
    }
} else {
    // form belum diisi
    include 'form.inc';
}
?>