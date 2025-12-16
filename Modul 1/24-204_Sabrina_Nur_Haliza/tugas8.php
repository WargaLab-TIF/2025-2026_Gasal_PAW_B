<?php
$teks = "halo dunia";

echo "panjang string: " . strlen($teks) . "<br>";       // panjang string
echo "jumlah kata: " . str_word_count($teks) . "<br>";  // jumlah kata
echo "string terbalik: " . strrev($teks) . "<br>";      // string dibalik
echo "posisi 'PHP': " . strpos($teks, "PHP") . "<br>";  // posisi kata "PHP"
echo "ganti kata: " . str_replace("PHP", "Program", $teks) . "<br>"; // ganti kata
?>
