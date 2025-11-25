<?php
$errors = array();
if (isset($_POST['surname'])) {
    require_once 'validate.inc';
    validateName($errors, $_POST, 'surname');
    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) {
            echo "$field $error<br/>";
        }
        // tampilkan kembali form
        include_once 'form.inc';
    } else {
        echo 'Form submitted successfully with no errors';
    }
} else {
    // tampilkan kembali form
    include_once 'form.inc';
}
?>