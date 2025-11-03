<?php
$errors = array();

if (isset($_POST['surname'])) {
    require 'validate.inc';

    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password', 8);
    validateRequired($errors, $_POST, 'address');
    validateRequired($errors, $_POST, 'state');
    validateRequired($errors, $_POST, 'gender');

    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        echo '<ul>';
        foreach ($errors as $field => $error) {
            echo "<li><strong>" . ucfirst($field) . "</strong>: $error</li>";
        }
        echo '</ul>';
        
        include 'form.inc';
    } else {
        echo 'Form submitted successfully with no errors';        
    }
} else {
    include 'form.inc';
}
?>