<?php
function validateName($post, $field) {
    $value = trim($post[$field] ?? '');
    if ($value === '') return "Nama tidak boleh kosong.";
    if (!preg_match("/^[a-zA-Z\s]+$/", $value)) return "Nama hanya boleh berisi huruf dan spasi.";
    return "";
}

function validateEmail($post, $field) {
    $email = trim($post[$field] ?? '');
    if ($email === '') return "Email tidak boleh kosong.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "Format email tidak valid.";
    return "";
}

function validatePassword($post, $field) {
    $pass = $post[$field] ?? '';
    if ($pass === '') return "Password tidak boleh kosong.";
    if (strlen($pass) < 8) return "Password minimal 8 karakter.";
    return "";
}

function validateDateField($post, $field) {
    $date = trim($post[$field] ?? '');
    if ($date === '') return "Tanggal lahir tidak boleh kosong.";
    
    $parts = explode('-', $date);
    if (count($parts) === 3) {
        [$y, $m, $d] = $parts;
        if (!checkdate((int)$m, (int)$d, (int)$y)) {
            return "Tanggal lahir tidak valid.";
        }
    } else {
        return "Format tanggal salah.";
    }

    return "";
}
?>