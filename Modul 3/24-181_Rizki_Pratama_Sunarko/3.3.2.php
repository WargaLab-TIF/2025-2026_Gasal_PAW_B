<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

/*
1. Menambahkan lima data baru dalam array $fruits dengan menggunakan struktur
perulangan FOR! Berapa panjang (atau jumlah data) array $fruits saat ini?
Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan 
FOR (skrip pada baris #5 – #8) untuk menampilkan seluruh data dalam array $fruits
dengan adanya penambahan lima data baru? Mengapa demikian? Jelaskan!
*/
for($i = 0; $i < 5; $i++) {
    $buah_baru = array("Durian", "Mango", "Apple", "Orange", "Banana");
    $fruits[] = $buah_baru[$i]; 
}

$panjang_array = count($fruits);

for($x = 0; $x < $panjang_array; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

echo "<br>Jumlah data dalam array fruits saat ini: " . $panjang_array;

echo "<hr>";

/*
2.Buat array baru dengan nama $vegies yang memiliki tiga buah data! Tampilkan
seluruh data dari array $vegies dengan menggunakan stuktur perulangan FOR!
Apakah Anda membuat skrip baru untuk menampilkan seluruh array $vegies
ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada? Mengapa demikian?
Jelaskan!
*/

$vegies = array("Bayam", "Kangkung", "Sawi");
$panjang_array2 = count($vegies);

for ($y = 0; $y < $panjang_array2; $y++) {
    echo $vegies[$y];
    echo "<br>";
}

?>
