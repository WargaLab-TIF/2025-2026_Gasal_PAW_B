<?php
$kalimat = "Belajar PHP itu menyenangkan kalau diajak login MLBB";
echo "Jumlah karakter: " . strlen($kalimat) . "<br>";
echo "Jumlah kata: " . str_word_count($kalimat) . "<br>";
echo "Reverse: " . strrev($kalimat) . "<br>";
echo "Posisi 'PHP': " . strpos($kalimat, "PHP") . "<br>";
echo "Ganti kata: " . str_replace("menyenangkan", "mudah", $kalimat);
?>