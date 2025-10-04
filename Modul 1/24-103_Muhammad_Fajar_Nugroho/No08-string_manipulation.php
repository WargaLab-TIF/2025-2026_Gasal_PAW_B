<?php
$str = "Hello ini, PHP!";
echo "String asli adalah: " . $str . "<br>";
echo "Panjang dari string adalah " . strlen($str) . "<br>"; // Output: 12
echo "Jumlah kata dalam string adalah " . str_word_count($str) . "<br>"; // Output: 2
echo "String terbalik adalah " . strrev($str) . "<br>"; // Output: !PHP ,olleH
echo "Posisi 'PHP' dalam string adalah: " . strpos($str, "PHP") . "<br>"; // Output: 11
echo "String setelah diganti 'PHP' dengan 'World': " . str_replace("PHP", "World", $str) . "<br>";
?>