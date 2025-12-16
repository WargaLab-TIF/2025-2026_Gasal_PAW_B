<?php
// validate.inc
function validateForm($nama, $alamat, $email, $gender, $tanggal_lahir, $password) {
    $errors = [];

    // Validasi nama: hanya huruf
    if (empty($nama)) {
        $errors['nama'] = "Nama tidak boleh kosong.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
        $errors['nama'] = "Nama hanya boleh berisi huruf.";
    }

    // Validasi alamat
    if (empty($alamat)) {
        $errors['alamat'] = "Alamat wajib diisi.";
    }

    // Validasi email
    if (empty($email)) {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    // Validasi gender
    if (empty($gender)) {
        $errors['gender'] = "Pilih jenis kelamin.";
    }

    // Validasi tanggal lahir
    if (empty($tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi.";
    }

    // Validasi password
    if (empty($password)) {
        $errors['password'] = "Password wajib diisi.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password minimal 6 karakter.";
    } elseif (!preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $errors['password'] = "Password harus mengandung huruf besar dan angka.";
    }

    return $errors;
}
?>
