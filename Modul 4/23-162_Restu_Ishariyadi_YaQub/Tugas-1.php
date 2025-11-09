<?php
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    require 'validate.inc';
    
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    
    if ($errors) 
    {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error)
            echo "$field $error</br>";
        
        include 'form.inc';
    } 
    else 
    {
        echo 'Form submitted successfully with no errors';
    }
} 
else 
{
    include 'form.inc';
}
?>