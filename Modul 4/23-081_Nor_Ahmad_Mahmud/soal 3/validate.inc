<?php
// ========================================================
// File: validateMahasiswa.inc
// Fungsi-fungsi validasi form mahasiswa (server-side)
// ========================================================

function validateNama(&$errors, $field_list, $field_name) {
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = "Nama wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z' -]+$/", $field_list[$field_name])) {
        $errors[$field_name] = "Nama hanya boleh huruf dan spasi.";
    }
}

function validateNIM(&$errors, $field_list, $field_name) {
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = "NIM wajib diisi.";
    } elseif (!preg_match("/^[0-9]{8,10}$/", $field_list[$field_name])) {
        $errors[$field_name] = "NIM harus berupa angka (8–10 digit).";
    }
}

function validateEmail(&$errors, $field_list, $field_name) {
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = "Email wajib diisi.";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/", $field_list[$field_name])) {
        $errors[$field_name] = "Format email tidak valid (regex).";
    }
}

function validatePassword(&$errors, $field_list, $field_name) {
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = "Password wajib diisi.";
    } elseif (strlen($field_list[$field_name]) < 6 || strlen($field_list[$field_name]) > 12) {
        $errors[$field_name] = "Password harus 6–12 karakter.";
    }
}
?>
