<?php

require_once 'validate.inc';

$errors = array();

if (isset($_POST['surname'])) {
    // tidak perlu require lagi
    validateName($errors, $_POST, 'surname');
    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error)
            echo "$field $error</br>";
        include 'form.inc'; // gunakan include agar form ditampilkan
    } else {
        echo 'Form submitted successfully with no errors';
    }
} else {
    include 'form.inc'; // gunakan include agar form ditampilkan
}
?>
