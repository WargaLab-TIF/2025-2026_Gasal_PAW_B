<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$fruits2 = array("Watermelon","Apple","Stroberi", "Pinneaple", "Grape");

// Tambahkan 5 data baru
for ($i = 0; $i < count($fruits2); $i++) {
    $fruits[] = $fruits2[$i];
}



echo "<br>";
// soal 1
echo "1. Menambahkan lima data baru dalam array $ fruits dengan menggunakan stuktur perulangan FOR! Berapa panjang (atau berapa jumlah data) array $ fruits saat ini? Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan FOR (skrip pada baris #5 – #8) untuk menampilkan seluruh data dalam array $ fruits dengan adanya penambahan lima data baru? Mengapa demikian? Jelaskan!";
echo "<br> <br> jawab:<br>";
for ($x = 0; $x < count($fruits); $x++) {
    echo $fruits[$x] . "<br>";
}
echo "<br>Panjang array $ fruits saat ini: " . count($fruits);


echo "<br><br>";
// soal 2
echo "2. Buat array baru dengan nama $ vegies yang memiliki tiga buah data! Tampilkan seluruh data dari array $ vegies dengan menggunakan stuktur perulangan FOR! Apakah Anda membuat skrip baru untuk menampilkan seluruh array $ vegies ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada? Mengapa demikian? Jelaskan!";  
echo "<br> jawab:";
$vegies = ["Bayam", "Wortel", "Kangkung"];
for ($i = 0; $i < count($vegies); $i++) {
    echo "<br>" . $vegies[$i];
};

echo "<br> panjang data array: ".count($vegies);
?>