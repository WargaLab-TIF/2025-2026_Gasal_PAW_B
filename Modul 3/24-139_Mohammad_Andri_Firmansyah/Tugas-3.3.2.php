<?php

# Kode dari soal
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
echo $fruits[$x];
echo "<br>";
}

/* 1. Menambahkan lima data baru dalam array $fruits dengan menggunakan stuktur
perulangan FOR! Berapa panjang (atau berapa jumlah data) array $fruits saat ini?
Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan
FOR (skrip pada baris #5 – #8) untuk menampilkan seluruh data dalam array $fruits
dengan adanya penambahan lima data baru? Mengapa demikian? Jelaskan! */

echo "<hr>";
$fruits2 = array("Banana", "Grape", "Apple", "Strawberry", "Mangoesten");
$arrlength2 = count($fruits2);
for($i = 0; $i < $arrlength2; $i++) {
    $fruits[] = $fruits2[$i];
}
    
$arrlength = count($fruits);
echo "Panjang data saat ini: $arrlength <br>";
for($j = 0; $j < $arrlength; $j++) {
    echo $fruits[$j];
    echo "<br>";
}

/* 2. Buat array baru dengan nama $vegies yang memiliki tiga buah data! Tampilkan
seluruh data dari array $vegies dengan menggunakan stuktur perulangan FOR!
Apakah Anda membuat skrip baru untuk menampilkan seluruh array $vegies
ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada? Mengapa demikian?
Jelaskan! */

echo "<hr>";
$vegies = array("Corn", "Tomato", "Potato");
$arrlength = count($vegies);
for($k = 0; $k < $arrlength; $k++) {
    echo $vegies[$k];
    echo "<br>";
}
?>