<?php
// 08_string_functions.php — Manipulasi string dasar
$str = "Belajar PHP itu menyenangkan";

echo "Teks: $str<br>";
echo "strlen(): " . strlen($str) . "<br>";
echo "str_word_count(): " . str_word_count($str) . "<br>";
echo "strrev(): " . strrev($str) . "<br>";

// strpos(): cari posisi substring
$pos = strpos($str, "PHP");
echo "strpos('PHP'): " . ($pos !== false ? $pos : "tidak ditemukan") . "<br>";

// str_replace(): ganti kata
echo "str_replace('menyenangkan','seru'): " . str_replace("menyenangkan", "seru", $str) . "<br>";
?>
