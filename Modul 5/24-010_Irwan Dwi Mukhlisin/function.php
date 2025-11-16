<?php
function validateName(&$error, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z' -]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $error[$field_name] = 'Nama wajib diisi';
    } elseif (!preg_match($pattern, $field_list[$field_name]))
        $error[$field_name] = 'Format nama tidak sesuai';
}
function validateTelp(&$error, $field_list, $field_name)
{
    $pattern = "/^[0-9]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $error[$field_name] = 'Telp wajib diisi';
    } elseif (!preg_match($pattern, $field_list[$field_name]))
        $error[$field_name] = 'Telp telp wajib angka';
}
function validateAlamat(&$error, $field_list, $field_name)
{
    if (trim($field_list[$field_name]) == "") {
        $error[$field_name] = "alamat tidak boleh kosong";
    }
}