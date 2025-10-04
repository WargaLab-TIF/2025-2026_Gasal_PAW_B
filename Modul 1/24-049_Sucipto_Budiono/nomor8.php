<?php
$kalimat = "Saya sedang belajar php";

echo "Kalimat: $kalimat <br>"; //menampilkan string asli
echo "Panjang string: " . strlen($kalimat) . "<br>"; //menghitung panjang string termasuk spasi
echo "Jumlah kata: " . str_word_count($kalimat) . "<br>"; //menghitung jumlah kata dalam string
echo "Dibalik: " . strrev($kalimat) . "<br>"; //membalik kata dalam string
echo "Posisi 'php': " . strpos($kalimat, "php") . "<br>"; //mencari posisi kata dalam string
echo "Ganti kata: " . str_replace("php", "buku", $kalimat); //mengganti kata dalam string
?>
