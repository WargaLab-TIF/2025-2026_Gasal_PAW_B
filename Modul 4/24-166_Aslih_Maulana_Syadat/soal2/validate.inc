<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
        return false;
    }

    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid (only letters, hyphen, or apostrophe allowed)';
        return false;
    }
    return true;
}

function validateRequired(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
        return false;
    }
    return true;
}

function validateEmail(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
        return false;
    }

    if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid format';
        return false;
    }
    return true;
}

function validatePassword(&$errors, $field_list, $field_name, $min_length = 8) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
        return false;
    }

    if (strlen($field_list[$field_name]) < $min_length) {
        $errors[$field_name] = "must be at least $min_length characters long";
        return false;
    }
    return true;
}

?>