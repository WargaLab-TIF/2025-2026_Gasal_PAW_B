<?php
// 08_string_functions.php — Contoh manipulasi string di PHP

// Deklarasi string
$str = "Rizki Pratama Sunarko";

// Menampilkan teks asli
echo "Teks: $str<br><br>";

// Fungsi string bawaan PHP
echo "strlen(): " . strlen($str) . "<br>";                // Hitung jumlah karakter
echo "str_word_count(): " . str_word_count($str) . "<br>";// Hitung jumlah kata
echo "strrev(): " . strrev($str) . "<br>";                // Membalikkan teks

// strpos(): mencari posisi substring dalam teks
$pos = strpos($str, "Pratama");
echo "strpos('Pratama'): " . ($pos !== false ? $pos : "tidak ditemukan") . "<br>";

// str_replace(): mengganti kata tertentu dalam teks
echo "str_replace('Sunarko','Informatika'): " 
    . str_replace("Sunarko", "Informatika", $str) . "<br>";
?>
