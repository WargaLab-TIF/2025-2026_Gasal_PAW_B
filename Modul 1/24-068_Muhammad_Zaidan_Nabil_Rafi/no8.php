
<?php
$kalimat = "Muhammad Zaidan Nabil Rafi";

echo "Panjang string: " . strlen($kalimat) . "<br>";
echo "Jumlah kata: " . str_word_count($kalimat) . "<br>";
echo "Dibalik: " . strrev($kalimat) . "<br>";
echo "Posisi 'PHP': " . strpos($kalimat, "PHP") . "<br>";
echo "Ganti kata: " . str_replace("menyenangkan", "mudah", $kalimat);
?>
