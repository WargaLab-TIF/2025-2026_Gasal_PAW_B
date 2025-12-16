<?php
function validateName(&$errors, $field_list, $field_name)
{
    // Pola format nama (hanya huruf alfabet, tanda petik, dan tanda hubung)
    $pattern = "/^[a-zA-Z'-]+$/";

    // Cek apakah field kosong atau belum diisi
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required'; // error: wajib diisi
    }
    // Cek apakah format tidak sesuai pola
    else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid'; // error: format tidak sesuai
    }
}
?>