<?php
// ----------------------------------------------------
// File: validate.inc
// Deskripsi: Validasi server-side untuk form mahasiswa
// Mencakup penggunaan: regex, string, filter, type, date, password
// ----------------------------------------------------

function validateForm($nama, $alamat, $email, $gender, $tanggal_lahir, $password) {
    $errors = [];

    // 1. STRING HANDLING
    $nama = trim($nama);
    $alamat = trim($alamat);
    $email = trim(strtolower($email)); 
    $password = trim($password);

    // 2. VALIDASI NAMA (regex + panjang minimal)
    if (empty($nama)) {
        $errors['nama'] = "Nama tidak boleh kosong.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh berisi huruf dan spasi.";
    } elseif (strlen($nama) < 3) {
        $errors['nama'] = "Nama terlalu pendek (minimal 3 huruf).";
    }

    // 3. VALIDASI EMAIL (filter + regex)
    if (empty($email)) {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    } elseif (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/", $email)) {
        $errors['email'] = "Email harus dalam format standar (misal: nama@mail.com).";
    }

    // 4. VALIDASI ALAMAT
    if (empty($alamat)) {
        $errors['alamat'] = "Alamat wajib diisi.";
    } elseif (strlen($alamat) < 10) {
        $errors['alamat'] = "Alamat terlalu pendek (minimal 10 karakter).";
    }

    // 5. TYPE TESTING
    if (!is_string($nama) || !is_string($alamat)) {
        $errors['type'] = "Input nama dan alamat harus berupa teks.";
    }

    // 6. VALIDASI GENDER
    if (empty($gender)) {
        $errors['gender'] = "Silakan pilih jenis kelamin.";
    } elseif (!in_array($gender, ["Laki-laki", "Perempuan"])) {
        $errors['gender'] = "Pilihan jenis kelamin tidak valid.";
    }

    // 7. VALIDASI TANGGAL LAHIR
    if (empty($tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi.";
    } else {
        $tgl = explode("-", $tanggal_lahir);
        if (count($tgl) === 3) {
            $tahun = (int)$tgl[0];
            $bulan = (int)$tgl[1];
            $hari = (int)$tgl[2];
            if (!checkdate($bulan, $hari, $tahun)) {
                $errors['tanggal_lahir'] = "Tanggal lahir tidak valid.";
            }
        } else {
            $errors['tanggal_lahir'] = "Format tanggal salah.";
        }
    }

    // 8. VALIDASI PASSWORD
    if (empty($password)) {
        $errors['password'] = "Password wajib diisi.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password minimal 6 karakter.";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors['password'] = "Password harus mengandung minimal satu huruf besar.";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $errors['password'] = "Password harus mengandung minimal satu huruf kecil.";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $errors['password'] = "Password harus mengandung minimal satu angka.";
    }

    return $errors;
}
?>
