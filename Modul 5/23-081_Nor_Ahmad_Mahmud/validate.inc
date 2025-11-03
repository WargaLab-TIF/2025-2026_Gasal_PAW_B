<?php
function validateSupplier($nama, $telp, $alamat) {
    $errors = [];

    if (empty($nama) || empty($telp) || empty($alamat)) {
        $errors[] = "Semua field wajib diisi!";
    }

    if (!preg_match("/^[a-zA-Z0-9 .,'-]+$/", $nama)) {
        $errors[] = "Nama tidak valid (hanya huruf, angka, spasi, dan tanda baca ringan)";
    }

    if (!preg_match("/^[0-9]{8,15}$/", $telp)) {
        $errors[] = "Nomor telepon harus berupa angka 8-15 digit.";
    }

    if (!preg_match("/^[a-zA-Z0-9 .,'-]+$/", $alamat)) {
        $errors[] = "Alamat tidak valid.";
    }

    return $errors;
}
?>
