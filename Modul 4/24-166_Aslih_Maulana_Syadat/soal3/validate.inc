<?php

//1. Validasi Regex Memvalidasi nama
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
        return false;
    }

    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid (only letters, hyphen, or apostrophe allowed)';
        return false;
    }
    return true;
}

//2. Validasi String (trim) Memvalidasi field yang wajib diisi, setelah menghapus spasi di awal/akhir.
function validateRequired(&$errors, $field_list, $field_name) {
    // Menggunakan trim() dari kategori String
    $value = isset($field_list[$field_name]) ? trim($field_list[$field_name]) : '';
    
    if (empty($value)) {
        $errors[$field_name] = 'required';
        return false;
    }
    return true;
}

 //3. Validasi Filter (FILTER_VALIDATE_EMAIL) Memvalidasi format email.
function validateEmail(&$errors, $field_list, $field_name) {
    if (!validateRequired($errors, $field_list, $field_name)) {
        return false; // Gagal di 'required', jadi tidak perlu cek format
    }

    // Menggunakan filter_var() dari kategori Filter
    if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid format';
        return false;
    }
    return true;
}

function validatePassword(&$errors, $field_list, $field_name, $min_length = 8) {
    if (!validateRequired($errors, $field_list, $field_name)) {
        return false;
    }

    if (strlen($field_list[$field_name]) < $min_length) {
        $errors[$field_name] = "must be at least $min_length characters long";
        return false;
    }
    return true;
}

//3. Validasi Filter (FILTER_VALIDATE_URL) Memvalidasi format URL.
function validateURL(&$errors, $field_list, $field_name) {
    if (isset($field_list[$field_name]) && !empty($field_list[$field_name])) {
        // Menggunakan filter_var() dan FILTER_VALIDATE_URL
        if (!filter_var($field_list[$field_name], FILTER_VALIDATE_URL)) {
            $errors[$field_name] = 'invalid URL format';
            return false;
        }
    }
    return true; 
}

//4. Validasi Type Testing (is_numeric) Memvalidasi bahwa input adalah angka (misal: untuk Umur).
function validateNumeric(&$errors, $field_list, $field_name) {
    if (!validateRequired($errors, $field_list, $field_name)) {
        return false;
    }

    // Menggunakan is_numeric() dari kategori Type Testing
    if (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = 'must be a number';
        return false;
    }
    return true;
}

//5. Validasi Date (checkdate) Memvalidasi tanggal dengan format YYYY-MM-DD.
function validateDate(&$errors, $field_list, $field_name) {
    if (!validateRequired($errors, $field_list, $field_name)) {
        return false;
    }
    
    // Asumsi format YYYY-MM-DD
    $parts = explode('-', $field_list[$field_name]);
    
    // Cek format (harus ada 3 bagian) dan gunakan checkdate()
    if (count($parts) == 3 && checkdate($parts[1], $parts[2], $parts[0])) {
        return true; // Tanggal valid
    } else {
        $errors[$field_name] = 'invalid date (must be YYYY-MM-DD)';
        return false;
    }
}

?>