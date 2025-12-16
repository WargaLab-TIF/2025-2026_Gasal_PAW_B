<?php
$errors = array();
if (isset($_POST['surname']))
{
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'passwd');

    if ($errors)
    {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error)
            echo "$field $error</br>";
        
        echo '<form name="myForm" action="register.php" method="POST">';
        include 'form.inc';
        echo '</form>';
    } 
    else 
    {
        echo 'Form submitted successfully with no errors';
    }
} 
else 
{
    echo '<form name="myForm" action="register.php" method="POST">';
    include 'form.inc';
    echo '</form>';
}
?>