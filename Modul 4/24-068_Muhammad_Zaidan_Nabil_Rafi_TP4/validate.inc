<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/"; // hanya huruf, tanda petik, dan strip
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid (only letters allowed)';
    }
}

function validateEmail(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid (wrong email format)';
    }
}

function validatePassword(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (strlen($field_list[$field_name]) < 6) {
        $errors[$field_name] = 'too short (min 6 characters)';
    } elseif (!preg_match('/[A-Z]/', $field_list[$field_name])) {
        $errors[$field_name] = 'must contain at least one uppercase letter';
    } elseif (!preg_match('/[0-9]/', $field_list[$field_name])) {
        $errors[$field_name] = 'must contain at least one number';
    }
}

function validateAddress(&$errors, $field_list, $field_name) {
    if (empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    } else {
        $address = trim($field_list[$field_name]);
        $address = ucfirst(strtolower($address)); // contoh penggunaan string function
    }
}

function validateState(&$errors, $field_list, $field_name) {
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    }
}

function validateGender(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (!is_string($field_list[$field_name])) {
        $errors[$field_name] = 'invalid type';
    }
}

function validateVegetarian(&$errors, $field_list, $field_name) {
    if (isset($field_list[$field_name]) && $field_list[$field_name] !== "Yes") {
        $errors[$field_name] = 'invalid value';
    }
}
    
function validateDateExample(&$errors, $day, $month, $year) {
    if (!checkdate($month, $day, $year)) {
        $errors['birthdate'] = 'invalid date';
    }
}
?>
