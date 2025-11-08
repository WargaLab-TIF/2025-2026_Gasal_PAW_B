<?php
$buah = ["Apel", "Jeruk", "Mangga", "Pisang", "Anggur", "Mangga"];

$posisi = array_search("Mangga", $buah);
echo "Posisi 'Mangga' pertama: " . ($posisi !== false ? $posisi : "Tidak ditemukan") . "\n";
