<?php
// Basic helper to fetch a field safely
function field_get($fields, $key, $default = '') {
    return isset($fields[$key]) ? trim($fields[$key]) : $default;
}

// 1) Regular expression + string helpers for Name
function validateNama(&$errors, $fields, $key = 'nama') {
    $value = field_get($fields, $key);
    if ($value === '') { $errors[$key] = 'required'; return false; }

    // String normalization examples
    $value = preg_replace('/\s+/', ' ', $value); // collapse spaces
    $value = trim($value);

    // Allow letters, spaces, apostrophe, hyphen
    $pattern = "/^[a-zA-Z\s'-]+$/";
    if (!preg_match($pattern, $value)) { $errors[$key] = 'invalid'; return false; }

    return true;
}

// 2) Email: filter_var and optional stricter regex
function validateEmail(&$errors, $fields, $key = 'email') {
    $value = strtolower(field_get($fields, $key)); // string: strtolower
    if ($value === '') { $errors[$key] = 'required'; return false; }
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) { $errors[$key] = 'invalid'; return false; }
    // Optional tighter regex example
    // if (!preg_match('/^[^@\s]+@[^@\s]+\.[^@\s]+$/', $value)) { $errors[$key] = 'invalid'; return false; }
    return true;
}

// 3) Password: length and simple policy via regex
function validatePassword(&$errors, $fields, $key = 'password', $min = 8) {
    $value = field_get($fields, $key);
    if ($value === '') { $errors[$key] = 'required'; return false; }
    if (strlen($value) < $min) { $errors[$key] = 'minlength'; return false; }
    // Require at least one letter and one digit (demo regex use)
    if (!preg_match('/[A-Za-z]/', $value) || !preg_match('/\d/', $value)) { $errors[$key] = 'weak'; return false; }
    return true;
}

// 4) NIM: type testing + regex digits length 8-12
function validateNIM(&$errors, $fields, $key = 'nim') {
    $value = field_get($fields, $key);
    if ($value === '') { $errors[$key] = 'required'; return false; }
    if (!is_numeric($value)) { $errors[$key] = 'not-numeric'; return false; }
    if (!preg_match('/^\d{8,12}$/', $value)) { $errors[$key] = 'invalid'; return false; }
    return true;
}

// 5) IPK: FILTER_VALIDATE_FLOAT and range 0.00 - 4.00
function validateIPK(&$errors, $fields, $key = 'ipk') {
    $raw = field_get($fields, $key);
    if ($raw === '') { $errors[$key] = 'required'; return false; }
    $val = filter_var($raw, FILTER_VALIDATE_FLOAT);
    if ($val === false) { $errors[$key] = 'invalid'; return false; }
    if ($val < 0 || $val > 4) { $errors[$key] = 'range'; return false; }
    return true;
}

// 6) URL optional
function validateURL(&$errors, $fields, $key = 'url') {
    $value = field_get($fields, $key);
    if ($value === '') return true; // optional
    if (!filter_var($value, FILTER_VALIDATE_URL)) { $errors[$key] = 'invalid'; return false; }
    return true;
}

// 7) IP optional
function validateIP(&$errors, $fields, $key = 'ip') {
    $value = field_get($fields, $key);
    if ($value === '') return true; // optional
    if (!filter_var($value, FILTER_VALIDATE_IP)) { $errors[$key] = 'invalid'; return false; }
    return true;
}

// 8) Tanggal lahir: expected YYYY-MM-DD; use checkdate
function validateTanggalLahir(&$errors, $fields, $key = 'tanggal_lahir') {
    $value = field_get($fields, $key);
    if ($value === '') { $errors[$key] = 'required'; return false; }
    $parts = explode('-', $value);
    if (count($parts) !== 3) { $errors[$key] = 'invalid'; return false; }
    [$y,$m,$d] = $parts;
    if (!ctype_digit($y) || !ctype_digit($m) || !ctype_digit($d)) { $errors[$key] = 'invalid'; return false; }
    if (!checkdate((int)$m, (int)$d, (int)$y)) { $errors[$key] = 'invalid'; return false; }
    return true;
}

// 9) Prodi select required
function validateProdi(&$errors, $fields, $key = 'prodi') {
    $value = field_get($fields, $key);
    $allowed = ['TI','SI','MI'];
    if ($value === '') { $errors[$key] = 'required'; return false; }
    if (!in_array($value, $allowed, true)) { $errors[$key] = 'invalid'; return false; }
    return true;
}

// 10) Gender radio required
function validateGender(&$errors, $fields, $key = 'gender') {
    $value = field_get($fields, $key);
    $allowed = ['Male','Female'];
    if ($value === '') { $errors[$key] = 'required'; return false; }
    if (!in_array($value, $allowed, true)) { $errors[$key] = 'invalid'; return false; }
    return true;
}

// 11) Alamat: required min len using strings
function validateAlamat(&$errors, $fields, $key = 'alamat', $min = 5) {
    $value = trim(field_get($fields, $key)); // trim example
    if ($value === '') { $errors[$key] = 'required'; return false; }
    if (strlen($value) < $min) { $errors[$key] = 'minlength'; return false; }
    return true;
}
