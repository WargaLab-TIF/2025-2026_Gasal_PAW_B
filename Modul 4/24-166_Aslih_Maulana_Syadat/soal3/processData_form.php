<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    require 'validate.inc';

    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password', 8);
    validateRequired($errors, $_POST, 'address'); 
    validateRequired($errors, $_POST, 'state');
    validateRequired($errors, $_POST, 'gender');

    validateNumeric($errors, $_POST, 'age');     
    validateURL($errors, $_POST, 'website');      
    validateDate($errors, $_POST, 'dob');         


    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        echo '<ul>';
        foreach ($errors as $field => $error) {
            echo "<li><strong>" . ucfirst($field) . "</strong>: $error</li>";
        }
        echo '</ul>';
        
        include 'form.inc';
    } else {
        echo '<h1>Form submitted successfully with no errors</h1>';
    }
} else {
    include 'form.inc';
}
?>