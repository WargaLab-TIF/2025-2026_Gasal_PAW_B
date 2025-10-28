<?php
require 'validate.inc';
$errors = []; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (validateName($_POST, 'surname', $errors)) {
        echo "<p style='color:green'>Form submitted successfully with no errors.</p>";
    }else {
        require 'form.php';
    }
} else {
    require 'form.php';
}
?>