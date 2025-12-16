<?php

# FUNGSI MEMBERSIHKAN DATA
function bersihkan($nama){
    return htmlspecialchars(trim($nama));
}

# FUNGSI VALIDASI DATA TRANSAKSI PENJUALAN
function validasinonota($nonota)
{
    if (!isset($nonota) || empty($nonota))
        return 'Nomor Nota harus terisi'; 
    else
        if (!is_numeric($nonota))
            return 'Nomor Nota harus berupa angka';
}

function validasitanggal($tanggal)
{
    $data_tanggal = explode("-", $tanggal);
    if (!isset($tanggal) || empty($tanggal))
        return 'Tanggal harus terisi'; 
    else
        if (!checkdate((int)$data_tanggal[1], (int)$data_tanggal[2], (int)$data_tanggal[0]))
            return 'Tanggal tidak valid';
}

function validasitotal($total)
{
    if (!isset($total) || empty($total))
        return 'Total harus terisi'; 
    else
        if (!is_numeric($total))
            return 'Total harus berupa angka';
}

function validasiketerangan($keterangan)
{
    $cocok2 = "/[A-Za-z0-9 ]+$/";
    if (!isset($keterangan) || empty($keterangan))
        return 'Keterangan harus terisi'; 
    else
        if (!preg_match($cocok2, $keterangan))
            return  'Keterangan tidak valid';
}



?>