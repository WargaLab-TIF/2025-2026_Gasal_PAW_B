<?php
// 06_interpolasi_konkatenasi.php — Interpolasi dan konkatenasi
$txt = "PHP";

// Interpolasi (pakai double quotes)
echo "I love $txt";
echo "<br>";

// Konkatenasi (pakai .)
echo "I love " . $txt;
echo "<br>";

// Kombinasi lainnya
$versi = "8.x";
echo "Belajar " . $txt . " versi $versi itu seru!";
?>
