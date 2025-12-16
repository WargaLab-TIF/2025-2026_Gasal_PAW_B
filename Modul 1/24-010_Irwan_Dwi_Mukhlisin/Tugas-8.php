<?php
$nama = 'Irwan Dwi Mukhlisin';

echo "Nama saya adalah $nama" . "<br>";
echo "Panjang string adalah :" . strlen($nama) . "<br>";
echo "Jumlah kata :" . str_word_count($nama) . "<br>";
echo "Balik string:  " . strrev($nama) . "<br>";

$posisi = strpos($nama, "Dwi");
echo "Posisi string Dwi : " . $posisi . "<br>";

$ganti = str_replace("Mukhlisin", "Maulana", $nama);
echo "Hasil ganti string : " . $ganti . "<br>";