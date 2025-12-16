<?php
// File: validate.inc

function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z' -]+$/";
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    } elseif (!preg_match($pattern, trim($field_list[$field_name]))) {
        $errors[$field_name] = 'invalid (only letters allowed)';
    } else {
        // String handling
        $field_list[$field_name] = strtolower(trim($field_list[$field_name]));
    }
}

function validateEmail(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    } elseif (!filter_var(trim($field_list[$field_name]), FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid email format';
    }
}

function validatePassword(&$errors, $field_list, $field_name)
{
    $password = trim($field_list[$field_name] ?? '');
    if (empty($password)) {
        $errors[$field_name] = 'required';
    } elseif (strlen($password) < 8) {
        $errors[$field_name] = 'must be at least 8 characters';
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors[$field_name] = 'must contain at least one uppercase letter and one number';
    }
}

function validateAge(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'required';
    } elseif (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = 'must be numeric';
    } elseif ((int)$field_list[$field_name] < 17 || (int)$field_list[$field_name] > 100) {
        $errors[$field_name] = 'must be between 17 and 100';
    }
}

function validateBirthDate(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } else {
        $dateParts = explode('-', $field_list[$field_name]);
        if (count($dateParts) === 3) {
            [$year, $month, $day] = $dateParts;
            if (!checkdate((int)$month, (int)$day, (int)$year)) {
                $errors[$field_name] = 'invalid date format';
            }
        } else {
            $errors[$field_name] = 'invalid date format';
        }
    }
}
