<?php
function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid';
    }
}

function validateEmail(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid';
    }
}

function validatePassword(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (strlen($field_list[$field_name]) < 6) {
        $errors[$field_name] = 'too short (min 6 characters)';
    }
}

function validateAge(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = 'must be numeric';
    } elseif ($field_list[$field_name] < 0 || $field_list[$field_name] > 120) {
        $errors[$field_name] = 'invalid range (0–120)';
    }
}

function validateDateOfBirth(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } else {
        // Format input: yyyy-mm-dd
        $dateParts = explode('-', $field_list[$field_name]);
        if (count($dateParts) === 3) {
            $year = (int)$dateParts[0];
            $month = (int)$dateParts[1];
            $day = (int)$dateParts[2];
            if (!checkdate($month, $day, $year)) {
                $errors[$field_name] = 'invalid date';
            }
        } else {
            $errors[$field_name] = 'invalid format (use yyyy-mm-dd)';
        }
    }
}
?>
