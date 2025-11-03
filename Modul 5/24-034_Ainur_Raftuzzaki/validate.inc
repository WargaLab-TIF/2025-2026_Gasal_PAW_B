<?php
function validateName($data, $field) {
    if (empty($data[$field])) {
        return "$field tidak boleh kosong.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data[$field])) {
        return "$field hanya boleh berisi huruf dan spasi.";
    }
    return "";
}

function validatePhone($data, $field) {
    if (empty($data[$field])) {
        return "$field tidak boleh kosong.";
    } elseif (!preg_match("/^[0-9]+$/", $data[$field])) {
        return "$field hanya boleh berisi angka.";
    }
    return "";
}

function validateAddress($data, $field) {
    if (empty($data[$field])) {
        return "$field tidak boleh kosong.";
    }
    return "";
}
?>