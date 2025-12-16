<?php

function bersihkan($nama){
    return htmlspecialchars(trim($nama));
}

function validasiNama($nama)
{
    $cocok1 = "/^PT [a-zA-Z0-9 ]+$/";
    if (!isset($nama) || empty($nama))
        return 'Nama harus terisi'; 
    else
        if (!preg_match($cocok1, $nama))
            return  'Nama harus diawali dengan PT';
}

function validasitelp($telp)
{
    if (!isset($telp) || empty($telp))
        return 'No telpon harus terisi'; 
    else
        if (!is_numeric($telp))
            return 'No Telpon harus berupa angka';
}

function validasialamat($alamat)
{
    $cocok2 = "/[a-zA-Z0-9 ]+[a-zA-Z0-9]+$/";
    if (!isset($alamat) || empty($alamat))
        return 'alamat harus terisi'; 
    else
        if (!preg_match($cocok2, $alamat))
            return  'alamat tidak valid';
}

?>