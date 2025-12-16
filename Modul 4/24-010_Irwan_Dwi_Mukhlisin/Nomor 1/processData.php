<?php
require 'validate.inc';
// if (validateName($_POST, 'surname')) {
//     echo 'Data Ok';
// } else {
//     echo 'data invalid';
// }

$error = array();
validateName($error, $_POST, 'surname');
if ($error) {
    echo 'Error:<br/>';
    foreach ($error as $field => $errors)
        echo "$field $errors</br>";
} else {
    echo 'Data OK!';
}

