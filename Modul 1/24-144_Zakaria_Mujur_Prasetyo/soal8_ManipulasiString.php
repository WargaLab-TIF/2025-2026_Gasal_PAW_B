<?php
// Inilisiasi
$str = "Zakaria Mujur Prasetyo";

echo "Teks Inilisiasi: $str<br>";
echo "<br>";
// strlen():
echo "strlen(): " . strlen($str) . "<br>";

// str_word_count():
echo "str_word_count(): " . str_word_count($str) . "<br>";

// strrev():
echo "strrev(): " . strrev($str) . "<br>";

// strpos():
$pos = strpos($str, "Mujur");
echo "strpos('Mujur'): " . ($pos !== false ? $pos : "tidak ditemukan") . "<br>";

// str_replace():
echo "str_replace('Zakaria','Zekk'): " . str_replace("Zakaria", "Zekk", $str) . "<br>";
?>
