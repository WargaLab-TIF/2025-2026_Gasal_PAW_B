<?php
// Validasi Nama (alfabet)
function validateNama(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z\'\- ]+$/"; // Tambahkan backslash \ sebelum -
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
        $errors[$field_name] = 'required';
    else if (!preg_match($pattern, $field_list[$field_name]))
        $errors[$field_name] = 'invalid format (letters and spaces only)';
}

// Validasi NIM (angka, 10 digit)
function validateNIM(&$errors, $field_list, $field_name)
{
    $pattern = "/^[0-9]{10}$/"; // Tepat 10 digit angka
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
        $errors[$field_name] = 'required';
    else if (!preg_match($pattern, $field_list[$field_name]))
        $errors[$field_name] = 'must be exactly 10 digits';
}

// Validasi Email (Regex) 
function validateEmail(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
        $errors[$field_name] = 'required';
    else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) // 
        $errors[$field_name] = 'invalid email format';
}

// Validasi Password (Panjang) 
function validatePassword(&$errors, $field_list, $field_name)
{
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
        $errors[$field_name] = 'required';
    else if (strlen($field_list[$field_name]) < 8)
        $errors[$field_name] = 'must be at least 8 characters long';
}
?>