<?php
function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z'-]+$/"; // format surname (alfabet, ' dan -)

    if (!isset($field_list[$field_name]) || $field_list[$field_name] === '') {
        $errors[$field_name] = 'required';
        return false;
    }

    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid';
        return false;
    }

    return true;
}

function validateEmailField(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || $field_list[$field_name] === '') {
        $errors[$field_name] = 'required';
        return false;
    }
    if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid';
        return false;
    }
    return true;
}

function validatePasswordField(&$errors, $field_list, $field_name, $minLen = 6)
{
    if (!isset($field_list[$field_name]) || $field_list[$field_name] === '') {
        $errors[$field_name] = 'required';
        return false;
    }
    if (strlen($field_list[$field_name]) < $minLen) {
        $errors[$field_name] = 'minlength';
        return false;
    }
    return true;
}

function validateRequiredText(&$errors, $field_list, $field_name, $minLen = 3)
{
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'required';
        return false;
    }
    if ($minLen && strlen(trim($field_list[$field_name])) < $minLen) {
        $errors[$field_name] = 'minlength';
        return false;
    }
    return true;
}

function validateSelect(&$errors, $field_list, $field_name, $allowed)
{
    if (!isset($field_list[$field_name]) || $field_list[$field_name] === '') {
        $errors[$field_name] = 'required';
        return false;
    }
    if (!in_array($field_list[$field_name], $allowed, true)) {
        $errors[$field_name] = 'invalid';
        return false;
    }
    return true;
}

function validateRadio(&$errors, $field_list, $field_name, $allowed)
{
    if (!isset($field_list[$field_name]) || $field_list[$field_name] === '') {
        $errors[$field_name] = 'required';
        return false;
    }
    if (!in_array($field_list[$field_name], $allowed, true)) {
        $errors[$field_name] = 'invalid';
        return false;
    }
    return true;
}
