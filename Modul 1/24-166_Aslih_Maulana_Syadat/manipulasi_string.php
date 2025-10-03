<?php
$kata = "Syadat";
$kalimat = "Nama saya Syadat";

// strlen() -> Menghitung jumlah karakter pada string
echo "strlen: ";
echo strlen($kata);
echo "<br>";

// str_word_count() -> Menghitung jumlah kata pada string
echo "str_word_count: ";
echo str_word_count($kalimat);
echo "<br>";

// strrev() -> Membalikkan string
echo "strrev: ";
echo strrev($kata);
echo "<br>";

// strpos() -> Mencari posisi karakter pada string
echo "strpos: ";
echo strpos($kalimat, "saya");
echo "<br>";

// str_replace() -> Mengganti karakter pada string
echo "str_replace: ";
echo str_replace("Syadat", "Budi", $kalimat);
?>