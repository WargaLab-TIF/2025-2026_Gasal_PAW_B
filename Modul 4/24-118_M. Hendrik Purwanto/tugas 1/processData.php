<?php

require 'validate.php'; 

$errors = array();

if (isset($_POST['submit'])) {
    
    validateName($errors, $_POST, 'surname');

    if ($errors) {
        echo 'Errors:<br/>';
        foreach ($errors as $field => $error) {
            echo "$field $error</br>";
        }
    } else {
        echo 'Data OK!';
        
        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $surname = $_POST['surname'];
        echo "<br>Firstname: $fname";
        echo "<br>Surname: $surname";
    }

} else {
    echo "Isi Form terlebih dahulu.";
}

?>