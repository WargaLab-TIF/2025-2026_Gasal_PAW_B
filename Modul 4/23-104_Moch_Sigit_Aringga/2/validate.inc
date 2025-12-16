<?php

// Validasi Surname
function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z'-]+$/"; // hanya huruf, apostrof, dan tanda hubung

    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'is required';
    } 
    else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'must contain only letters, hyphens, and apostrophes';
    }
}

// Validasi Email
function validateEmail(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'is required';
    } 
    else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'is not a valid email format (e.g., user@example.com)';
    }
}

// Validasi Password (minimal 8 karakter)
function validatePassword(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'is required';
    } 
    else if (strlen($field_list[$field_name]) < 8) {
        $errors[$field_name] = 'must be at least 8 characters long';
    }
}

// Validasi Address
function validateAddress(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'is required';
    }
    else if (strlen(trim($field_list[$field_name])) < 10) {
        $errors[$field_name] = 'must be at least 10 characters long';
    }
}

// Validasi State
function validateState(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'must be selected';
    }
}

// Validasi Gender
function validateGender(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'must be selected';
    }
}

?>
