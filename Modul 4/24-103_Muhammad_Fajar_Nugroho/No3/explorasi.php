<?php
// 1. REGULAR EXPRESSIONS (Contoh: preg_match)
function validateKode(&$errors, $kode) {
    $field = 'kode';
    $kode = trim($kode);
    if (empty($kode)) {
        $errors[$field] = 'Kode wajib diisi';
    } elseif (!preg_match('/^[A-Z]{3}-[0-9]{3}$/', $kode)) {
        $errors[$field] = 'Format Kode harus 3 HURUF, tanda hubung, 3 ANGKA (cth: ABC-123)';
    }
}

// 2. STRING (Contoh: trim, strtolower, strtoupper)
function validateNama(&$errors, $nama) {
    $field = 'nama';
    $nama = trim($nama);
    $nama = strtolower($nama);
    $nama = strtoupper($nama);
    if (empty($nama)) {
        $errors[$field] = 'Nama wajib diisi';
    }
}

// 3. FILTER (Contoh: filter_var: FILTER_INPUT, EMAIL, URL, IP, FLOAT)
function validateEmailInput(&$errors) {
    $field = 'email';
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email === false || $email === null) {
        $errors[$field] = 'Format email tidak valid atau email tidak dikirim';
    }
}

function validateEmail(&$errors, $email) {
    $field = 'email';
    $email = trim($email);
    $email = strtolower($email);
    if (empty($email)) {
        $errors[$field] = 'Email wajib diisi';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field] = 'Format email tidak valid (contoh: email@domain.com)';
    }
}

function validateWebsite(&$errors, $url) {
    $field = 'website';
    $url = trim($url);
    if (empty($url)) {
        $errors[$field] = 'Website wajib diisi';
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[$field] = 'Format URL tidak valid (harus diawali http:// atau https://)';
    }
}

function validateIP(&$errors, $ip) {
    $field = 'ip';
    $ip = trim($ip);
    if (empty($ip)) {
        $errors[$field] = 'Alamat IP wajib diisi';
    } elseif (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $errors[$field] = 'Format Alamat IP tidak valid';
    }
}

function validateNilai(&$errors, $nilai) {
    $field = 'nilai';
    $nilai = trim($nilai);
    if (empty($nilai)) {
        $errors[$field] = 'Nilai wajib diisi';
    } elseif (!filter_var($nilai, FILTER_VALIDATE_FLOAT)) {
        $errors[$field] = 'Nilai harus angka desimal (contoh: 85.5)';
    }
}

// 4. TYPE TESTING (Contoh: is_float, is_int, is_numeric, is_string)
function validateJumlah(&$errors, $jumlah) {
    $field = 'jumlah';
    $jumlah = trim($jumlah);
    if (empty($jumlah)) {
        $errors[$field] = 'Jumlah wajib diisi';
    } elseif (!is_numeric($jumlah)) {
        $errors[$field] = 'Jumlah harus angka';
    } elseif (!is_int((int)$jumlah)) { 
        $errors[$field] = 'Jumlah harus bilangan bulat';
    }
}

function validateKomentar(&$errors, $komen) {
    $field = 'komentar';
    if (empty($komen)) {
        $errors[$field] = 'Komentar wajib diisi';
    } elseif (!is_string($komen)) {
        $errors[$field] = 'Komentar harus berupa string';
    }
}

// 5. DATE (Contoh: checkdate)
function validateTanggal(&$errors, $tgl) {
    $field = 'tanggal';
    $tgl = trim($tgl);
    if (empty($tgl)) {
        $errors[$field] = 'Tanggal wajib diisi';
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tgl)) {
        $errors[$field] = 'Format tanggal harus YYYY-MM-DD';
    } else {
        list($y, $m, $d) = explode('-', $tgl);
        if (!checkdate($m, $d, $y)) {
            $errors[$field] = 'Tanggal tidak valid (cth: 2023-02-30)';
        }
    }
}
?>
