<?php
function validateName(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'is required';
    } elseif (!preg_match("/^[a-zA-Z]*$/", $field_list[$field_name])) {
        $errors[$field_name] = 'must contain only letters';
    }
}

function validateEmail(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'is required';
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'is not a valid email format';
    }
}
?>