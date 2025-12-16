<?php
function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z' -]+$/"; // hanya huruf, tanda petik, spasi, atau '-'

    // Jika field tidak ada atau kosong
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'Field ' . $field_name . ' wajib diisi.';
    }
    // Jika format tidak sesuai
    else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Format ' . $field_name . ' hanya boleh huruf A–Z.';
    }
    // Jika lolos semua
    else {
        // Hapus error jika sebelumnya ada
        if (isset($errors[$field_name])) {
            unset($errors[$field_name]);
        }
    }
}
?>
