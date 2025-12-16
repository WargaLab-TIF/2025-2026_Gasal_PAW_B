<?php
$teks = "Belajar PHP itu menyenangkan";
echo "Panjang: " . strlen($teks) . "<br>";
echo "Jumlah kata: " . str_word_count($teks) . "<br>";
echo "Dibalik: " . strrev($teks) . "<br>";
echo "Posisi 'PHP': " . strpos($teks, "PHP") . "<br>";
echo str_replace("menyenangkan","mudah",$teks);
?>
