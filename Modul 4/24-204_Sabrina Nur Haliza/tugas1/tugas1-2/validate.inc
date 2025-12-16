<?php
function validateName($field_list, $field_name)
{
    // Cek apakah field ada
    if (!isset($field_list[$field_name]))
        return false;

    // Pola hanya huruf, tanda petik tunggal, atau tanda hubung
    $pattern = "/^[a-zA-Z'-]+$/";

    // Cek apakah sesuai pola
    if (!preg_match($pattern, $field_list[$field_name]))
        return false;

    // Jika lolos semua, valid
    return true;
}
?>
