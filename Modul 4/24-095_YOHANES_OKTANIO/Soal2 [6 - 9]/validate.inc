<?php
// Soal 9
function validateName(&$errors, $field_list, $field_name)
{
    $pattern['surname'] = "/^[a-zA-Z'-]+$/"; 
    $pattern["email"] = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $pattern['password'] = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = "required";
    } else if (!preg_match($pattern[$field_name], $field_list[$field_name])) {
        $errors[$field_name] = "invalid";
    }
}

function validateIssets(&$errors,$fields,$field_name) {
    if (!isset($fields[$field_name]) || empty($fields[$field_name])) { 
        $errors[$field_name] = "required";
    }
}

?>