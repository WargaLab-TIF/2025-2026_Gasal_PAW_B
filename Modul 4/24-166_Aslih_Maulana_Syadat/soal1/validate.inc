<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
        return false;
    }

    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid';
        return false;
    }
    return true;
}
?>