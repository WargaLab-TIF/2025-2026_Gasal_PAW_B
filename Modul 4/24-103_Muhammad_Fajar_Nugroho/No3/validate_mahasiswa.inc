<?php
function validateNIM(&$errors, $nim) {
    $field = 'nim';
    if (empty($nim)) {
        $errors[$field] = 'NIM wajib diisi.';
    } elseif (!is_numeric($nim)) {
        $errors[$field] = 'NIM harus berupa angka.';
    } elseif (!preg_match('/^[0-9]{10,}$/', $nim)) {
        $errors[$field] = 'NIM harus terdiri dari minimal 10 digit angka.';
    }
}

function validateNama(&$errors, $nama) {
    $field = 'nama';
    if (empty($nama)) {
        $errors[$field] = 'Nama lengkap wajib diisi.';
    } elseif (!preg_match("/^[a-zA-Z\s'-]+$/", $nama)) {
        $errors[$field] = "Nama hanya boleh berisi huruf, spasi, ', dan -.";
    }
}

function validateEmail(&$errors, $email) {
    $field = 'email';
    if (empty($email)) {
        $errors[$field] = 'Email wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field] = 'Format email tidak valid.';
    }
}

function validatePassword(&$errors, $password) {
    $field = 'password';
    if (empty($password)) {
        $errors[$field] = 'Password wajib diisi.';
    } elseif (strlen($password) < 8) {
        $errors[$field] = 'Password minimal harus 8 karakter.';
    }
}

function validateKonfirmasiPassword(&$errors, $password, $konfirmasi_password) {
    $field = 'konfirmasi_password';
    if (empty($konfirmasi_password)) {
        $errors[$field] = 'Konfirmasi password wajib diisi.';
    } elseif ($password !== $konfirmasi_password) {
        $errors[$field] = 'Konfirmasi password tidak cocok dengan password.';
    }
}

function validateFormMahasiswa(&$errors, $data) {
    validateNIM($errors, $data['nim'] ?? '');
    validateNama($errors, $data['nama'] ?? '');
    validateEmail($errors, $data['email'] ?? '');
    validatePassword($errors, $data['password'] ?? '');
    validateKonfirmasiPassword($errors, $data['password'] ?? '', $data['konfirmasi_password'] ?? '');
}
?>