<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";

echo "<br>";
// soal 1
echo "1. Menambahkan lima data baru dalam array $ height! Tampilkan nilai dengan indeks terakhir dari array $ height!";
echo "<br> <br> jawab: ";


$height = [
    'Zekk' => 168,
    'Budi' => 172,
    'Fajar' => 169,
    'Syadat'  => 160,
    'Hana'  => 158
];

$lastKey = array_key_last($height);
echo "Indeks terakhir: $lastKey, nilai: {$height[$lastKey]} cm";

echo "<br>";
// soal 2
echo "2. Hapus satu data tertentu dari array $ height! Tampilkan nilai dengan indeks terakhir dari array $ height!";  
echo "<br> <br> jawab:";

// hapus elemen terakhir dengan array_slice
$lastKeyBefore = array_key_last($height);
$height = array_slice($height, 0, -1);

$lastKey2 = array_key_last($height);
echo "<br>Indeks terakhir sekarang: $lastKey2, nilai: {$height[$lastKey2]} cm";

echo "<br>";
//soal 3
echo "3. Buat array baru dengan nama $ weight yang memiliki tiga buah data! Tampilkan data kedua dari array $ weight!";  
echo "<br> <br> jawab:";

$weight = array(60, 65, 70);
echo $weight[1];
?>