<?php
function validateName(&$errors, $data, $field) {
  if (empty($data[$field])) {
    $errors[$field] = 'required';
  } elseif (!preg_match("/^[a-zA-Z'-]+$/", $data[$field])) {
    $errors[$field] = 'invalid';
  }
}

// Validasi email: wajib isi dan format email
function validateEmailField(&$errors, $data, $field) {
  if (empty($data[$field])) {
    $errors[$field] = 'required';
  } elseif (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
    $errors[$field] = 'invalid';
  }
}

// Validasi password: wajib isi dan minimal 6 karakter
function validatePasswordField(&$errors, $data, $field) {
  if (empty($data[$field])) {
    $errors[$field] = 'required';
  } elseif (strlen($data[$field]) < 6) {
    $errors[$field] = 'too short';
  }
}

// Validasi textarea: wajib isi dan minimal panjang karakter
function validateRequiredText(&$errors, $data, $field, $minLength = 5) {
  if (empty(trim($data[$field]))) {
    $errors[$field] = 'required';
  } elseif (strlen(trim($data[$field])) < $minLength) {
    $errors[$field] = "too short (min $minLength chars)";
  }
}

// Validasi select: nilai harus ada dalam daftar yang diizinkan
function validateSelect(&$errors, $data, $field, $allowedValues) {
  if (empty($data[$field]) || !in_array($data[$field], $allowedValues)) {
    $errors[$field] = 'invalid selection';
  }
}

// Validasi radio: wajib pilih dan harus sesuai dengan opsi yang tersedia
function validateRadio(&$errors, $data, $field, $allowedValues) {
  if (empty($data[$field])) {
    $errors[$field] = 'required';
  } elseif (!in_array($data[$field], $allowedValues)) {
    $errors[$field] = 'invalid choice';
  }
}
?>