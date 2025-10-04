<?php
// 07_aritmatika.php — Contoh operasi aritmatika di PHP

// Deklarasi variabel
$a = 10;   // bilangan pertama
$b = 3;    // bilangan kedua

// Menampilkan nilai awal
echo "Nilai awal: \$a = $a, \$b = $b<br><br>";

// Operasi aritmatika dasar
echo "Penjumlahan (\$a + \$b) = " . ($a + $b) . "<br>";     // 10 + 3 = 13
echo "Pengurangan (\$a - \$b) = " . ($a - $b) . "<br>";     // 10 - 3 = 7
echo "Perkalian (\$a * \$b) = " . ($a * $b) . "<br>";       // 10 * 3 = 30
echo "Pembagian (\$a / \$b) = " . ($a / $b) . "<br>";       // 10 / 3 ≈ 3.333...
echo "Modulus (\$a % \$b) = " . ($a % $b) . "<br>";         // sisa bagi 10 % 3 = 1

// Operasi pangkat
echo "Pangkat (pow(\$a, \$b)) = " . pow($a, $b) . "<br>";   // 10 pangkat 3 = 1000
?>
