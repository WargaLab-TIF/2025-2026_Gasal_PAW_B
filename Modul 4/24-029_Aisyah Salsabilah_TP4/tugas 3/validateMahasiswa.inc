<?php
// 1. Regular Expression - validasi nama
function validateName(&$errors, $field_list, $field_name) {
    $value = trim($field_list[$field_name]);
    if ($value == '') {
        $errors[$field_name] = "wajib diisi";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $value)) {
        $errors[$field_name] = "hanya boleh berisi huruf dan spasi";
    }
}

// 2. Filter (email)
function validateEmail(&$errors, $field_list, $field_name) {
    $email = trim($field_list[$field_name]);
    if ($email == '') {
        $errors[$field_name] = "wajib diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = "format email tidak valid";
    }
}

// 3. Regex untuk password minimal 8 karakter, 1 huruf besar, 1 angka
function validatePassword(&$errors, $field_list, $field_name) {
    $password = $field_list[$field_name];
    if ($password == '') {
        $errors[$field_name] = "wajib diisi";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
        $errors[$field_name] = "minimal 8 karakter, 1 huruf besar dan 1 angka";
    }
}

// 4. Type testing - NIM harus numerik
function validateNIM(&$errors, $field_list, $field_name) {
    $nim = trim($field_list[$field_name]);
    if ($nim == '') {
        $errors[$field_name] = "wajib diisi";
    } elseif (!is_numeric($nim)) {
        $errors[$field_name] = "harus berupa angka";
    }
}

// 5. Date - validasi tanggal lahir
function validateTanggal(&$errors, $field_list, $field_name) {
    $tanggal = $field_list[$field_name];
    if ($tanggal == '') {
        $errors[$field_name] = "wajib diisi";
    } else {
        $parts = explode("-", $tanggal);
        if (count($parts) == 3) {
            if (!checkdate($parts[1], $parts[2], $parts[0])) {
                $errors[$field_name] = "tanggal tidak valid";
            }
        } else {
            $errors[$field_name] = "format tanggal tidak valid";
        }
    }
}
?>