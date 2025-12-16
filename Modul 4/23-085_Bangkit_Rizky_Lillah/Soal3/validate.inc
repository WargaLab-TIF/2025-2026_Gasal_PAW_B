<?php

function validateName(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Nama wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $value)) {
        $errors[$field_name] = "Nama hanya boleh berisi huruf dan spasi.";
    }
}

function validateEmail(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Email wajib diisi.";
    } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "Format email tidak valid.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/", $value)) {
        $errors[$field_name] = "Format email tidak sesuai pola regex.";
    }
}

function validateNIM(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "NIM wajib diisi.";
    } elseif (!is_numeric($value)) {
        $errors[$field_name] = "NIM harus berupa angka.";
    } elseif (strlen($value) < 8 || strlen($value) > 12) {
        $errors[$field_name] = "NIM harus 8–12 digit.";
    }
}

function validatePassword(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Password wajib diisi.";
    } elseif (strlen($value) < 6) {
        $errors[$field_name] = "Password minimal 6 karakter.";
    } elseif (!preg_match("/[A-Z]/", $value) || !preg_match("/[0-9]/", $value)) {
        $errors[$field_name] = "Password harus mengandung huruf besar dan angka.";
    }
}

function validateDateField(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name] ?? '');
    if ($value === '') {
        $errors[$field_name] = "Tanggal lahir wajib diisi.";
    } else {
        $parts = explode('-', $value);
        if (count($parts) == 3) {
            if (!checkdate($parts[1], $parts[2], $parts[0])) {
                $errors[$field_name] = "Tanggal lahir tidak valid.";
            }
        } else {
            $errors[$field_name] = "Format tanggal salah (gunakan YYYY-MM-DD).";
        }
    }
}
?>
