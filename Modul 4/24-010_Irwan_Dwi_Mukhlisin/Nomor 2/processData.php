<?php
// $errors = array();

// if (isset($_POST['surname'])) {
//     require 'validate.inc';
//     validateName($errors, $_POST, 'surname');

//     if ($errors) {
//         echo '<h1>Invalid, correct the following errors:</h1>';
//         foreach ($errors as $field => $error) {
//             echo "$field : $error<br/>";
//         }

//         include 'form.inc';
//     } else {
//         echo '<h1>Form submitted successfully with no errors</h1>';
//     }
// } else {
//     include 'form.inc';
// }


$errors = array();
$old_data = array();

if (isset($_POST['surname'])) {
    validateName($error, $_POST, 'surname');
    validateEmail($error, $_POST, 'email', 'Email');
    validateAlamat($error, $_POST, 'alamat');
    $old_data = $_POST;

    if ($error) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($error as $field => $errors) {
            echo "$field : $errors<br/>";
        }

        include 'form.inc';
    } else {
        echo '<h1>Form submitted successfully with no errors</h1>';
    }
} else {
    include 'form.inc';
}
?>