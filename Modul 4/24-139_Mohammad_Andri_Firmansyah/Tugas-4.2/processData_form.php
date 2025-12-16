<?php
$errors = array();

if (isset($_POST['surname']) || isset($_POST['phone']))
{
    require 'validate2.inc';
    validateName($errors, $_POST, 'surname');
    validatePhone($errors, $_POST, 'phone');
    if ($errors)
        {
            echo '<h1>Invalid, correct the following errors:</h1>';
            foreach ($errors as $field => $error)
                echo "$field $error</br>";
            
            include 'form3.inc';
        } else
        {
            echo 'Form submitted successfully with no errors';
        }
} else
include 'form3.inc';
?>
