<?php
$input = "   Assatya Dewantara   ";
$trimmed = trim($input); // Hapus spasi di awal & akhir
$lower = strtolower($trimmed); // ubah ke huruf kecil
$upper = strtoupper($trimmed); // ubah ke huruf besar

echo "Asli: '$input'<br>";
echo "Trimmed: '$trimmed'<br>";
echo "Lowercase: $lower<br>";
echo "Uppercase: $upper<br>";
?>
