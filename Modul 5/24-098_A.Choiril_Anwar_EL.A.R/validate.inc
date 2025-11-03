<?php
function validateNama(&$errors, $field_list, $field_name){
    $pattern = "/^[a-zA-Z\s.,&'\-]*$/";
    
    if (empty(trim($field_list[$field_name] ?? ''))) {
        $errors[$field_name] = 'Nama wajib diisi.';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Nama hanya boleh huruf, spasi, dan karakter (.,&\'_).';
    }
}

function validateTelp(&$errors, $field_list, $field_name){
    $pattern = "/^[0-9\s+\-()]*$/"; 
    
    if (empty(trim($field_list[$field_name] ?? ''))) {
        $errors[$field_name] = 'Telp wajib diisi.';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Telp hanya boleh angka, spasi, dan karakter (+-()).';
    }
}

function validateAlamat(&$errors, $field_list, $field_name){
    if (empty(trim($field_list[$field_name] ?? ''))) {
        $errors[$field_name] = 'Alamat wajib diisi.';
    }
}
?>