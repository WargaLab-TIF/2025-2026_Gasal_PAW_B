<?php
$kalimat = "Belajar PHP sangat menyenangkan";

// strlen() 
echo "Panjang kalimat: " . strlen($kalimat) . "<br>";

// str_word_count() 
echo "Jumlah kata: " . str_word_count($kalimat) . "<br>";

// strrev() 
echo "Kalimat terbalik: " . strrev($kalimat) . "<br>";

// strpos() 
echo "Posisi kata 'PHP': " . strpos($kalimat, "PHP") . "<br>";

// str_replace() 
echo "Kalimat setelah diubah: " . str_replace("menyenangkan", "mudah", $kalimat) . "<br>";
?>