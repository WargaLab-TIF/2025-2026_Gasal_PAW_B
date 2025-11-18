<?php

function validateRequired(&$errors, $data, $field, $label) {
    if (!isset($data[$field]) || empty(trim($data[$field]))) {
        $errors[$field] = $label . ' wajib diisi';
        return false;
    }
    return true;
}

function validateMahasiswa(&$errors, $data) {
    
    if (validateRequired($errors, $data, 'nama', 'Nama Lengkap')) {
        $nama = trim($data['nama']);
        if (!preg_match("/^[a-zA-Z\s'-]+$/", $nama)) {
            $errors['nama'] = 'Nama Lengkap hanya boleh berisi huruf, spasi, tanda kutip, dan strip';
        }
    }
    
    if (validateRequired($errors, $data, 'nim', 'NIM')) {
        $nim = $data['nim'];
        if (!is_numeric($nim)) {
            $errors['nim'] = 'NIM harus berupa angka';
        } elseif (strlen($nim) != 10) {
            $errors['nim'] = 'NIM harus terdiri dari 10 digit';
        }
    }

    if (validateRequired($errors, $data, 'email', 'Email')) {
        $email = $data['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Format email tidak valid';
        }
    }
    
    if (validateRequired($errors, $data, 'password', 'Password')) {
        $pass = $data['password'];
        if (strlen($pass) < 8) {
            $errors['password'] = 'Password minimal harus 8 karakter';
        }
    }
    
    if (validateRequired($errors, $data, 'tgl_lahir', 'Tanggal Lahir')) {
        $tgl = $data['tgl_lahir'];
        $parts = explode('-', $tgl);
        if (count($parts) == 3) {
            if (!checkdate($parts[1], $parts[2], $parts[0])) {
                $errors['tgl_lahir'] = 'Tanggal Lahir bukan tanggal yang valid';
            }
        } else {
            $errors['tgl_lahir'] = 'Format Tanggal Lahir harus YYYY-MM-DD';
        }
    }
    
    if (validateRequired($errors, $data, 'ipk', 'IPK')) {
        $ipk = $data['ipk'];
        $options = [
            'options' => ['min_range' => 0.0, 'max_range' => 4.0]
        ];
        if (filter_var($ipk, FILTER_VALIDATE_FLOAT, $options) === false) {
            $errors['ipk'] = 'IPK harus berupa angka antara 0.00 dan 4.00';
        }
    }
    
    if (isset($data['website']) && !empty(trim($data['website']))) {
        $web = trim($data['website']);
        if (!filter_var($web, FILTER_VALIDATE_URL)) {
            $errors['website'] = 'Format URL website tidak valid';
        }
    }
}

?>