<?php
// Helper untuk mengambil nilai field dengan aman
function ambil_field($data, $key, $default = '') {
    return isset($data[$key]) ? trim($data[$key]) : $default;
}

// 1. Validasi Nama: regex + normalisasi string
function validasiNama(&$error, $data, $key = 'nama') {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') { $error[$key] = 'wajib diisi'; return false; }

    $nilai = preg_replace('/\s+/', ' ', $nilai);
    $pola = "/^[a-zA-Z\s'-]+$/";
    if (!preg_match($pola, $nilai)) { $error[$key] = 'format tidak valid'; return false; }

    return true;
}

// 2. Validasi Email: filter + regex tambahan
function validasiEmail(&$error, $data, $key = 'email') {
    $nilai = strtolower(ambil_field($data, $key));
    if ($nilai === '') { $error[$key] = 'wajib diisi'; return false; }
    if (!filter_var($nilai, FILTER_VALIDATE_EMAIL)) { $error[$key] = 'email tidak valid'; return false; }
    return true;
}

// 3. Validasi Password: panjang + kebijakan karakter
function validasiPassword(&$error, $data, $key = 'password', $min = 8) {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') { $error[$key] = 'wajib diisi'; return false; }
    if (strlen($nilai) < $min) { $error[$key] = 'minimal ' . $min . ' karakter'; return false; }
    if (!preg_match('/[A-Za-z]/', $nilai) || !preg_match('/\d/', $nilai)) {
        $error[$key] = 'harus mengandung huruf dan angka'; return false;
    }
    return true;
}

// 4. Validasi NIM: numeric + panjang 8–12 digit
function validasiNIM(&$error, $data, $key = 'nim') {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') { $error[$key] = 'wajib diisi'; return false; }
    if (!is_numeric($nilai)) { $error[$key] = 'harus angka'; return false; }
    if (!preg_match('/^\d{8,12}$/', $nilai)) { $error[$key] = 'harus 8–12 digit'; return false; }
    return true;
}

// 5. Validasi IPK: float + rentang 0.00–4.00
function validasiIPK(&$error, $data, $key = 'ipk') {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') { $error[$key] = 'wajib diisi'; return false; }
    $angka = filter_var($nilai, FILTER_VALIDATE_FLOAT);
    if ($angka === false || $angka < 0 || $angka > 4) {
        $error[$key] = 'rentang 0.00–4.00'; return false;
    }
    return true;
}

// 6. Validasi URL (opsional)
function validasiURL(&$error, $data, $key = 'url') {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') return true;
    if (!filter_var($nilai, FILTER_VALIDATE_URL)) { $error[$key] = 'URL tidak valid'; return false; }
    return true;
}

// 7. Validasi IP Address (opsional)
function validasiIP(&$error, $data, $key = 'ip') {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') return true;
    if (!filter_var($nilai, FILTER_VALIDATE_IP)) { $error[$key] = 'IP tidak valid'; return false; }
    return true;
}

// 8. Validasi Tanggal Lahir: format YYYY-MM-DD
function validasiTanggalLahir(&$error, $data, $key = 'tanggal_lahir') {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') { $error[$key] = 'wajib diisi'; return false; }
    $bagian = explode('-', $nilai);
    if (count($bagian) !== 3 || !checkdate((int)$bagian[1], (int)$bagian[2], (int)$bagian[0])) {
        $error[$key] = 'format tanggal tidak valid'; return false;
    }
    return true;
}

// 9. Validasi Prodi: pilihan tetap
function validasiProdi(&$error, $data, $key = 'prodi') {
    $nilai = ambil_field($data, $key);
    $daftar = ['Teknik Informatika', 'Sistem Informasi', 'Teknologi Informasi'];
    if ($nilai === '') { $error[$key] = 'wajib dipilih'; return false; }
    if (!in_array($nilai, $daftar)) { $error[$key] = 'pilihan tidak sah'; return false; }
    return true;
}

// 10. Validasi Gender: radio
function validasiGender(&$error, $data, $key = 'gender') {
    $nilai = ambil_field($data, $key);
    $daftar = ['Male', 'Female'];
    if ($nilai === '') { $error[$key] = 'wajib dipilih'; return false; }
    if (!in_array($nilai, $daftar)) { $error[$key] = 'pilihan tidak sah'; return false; }
    return true;
}

// 11. Validasi Alamat: minimal karakter
function validasiAlamat(&$error, $data, $key = 'alamat', $min = 5) {
    $nilai = ambil_field($data, $key);
    if ($nilai === '') { $error[$key] = 'wajib diisi'; return false; }
    if (strlen($nilai) < $min) { $error[$key] = 'minimal ' . $min . ' karakter'; return false; }
    return true;
}
?>