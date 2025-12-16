<?php

# Kode dari soal
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value) {
echo "Key=" . $x . ", Value=" . $x_value;
echo "<br>";
}

/* 1. Menambahkan lima data baru dalam array $height! Apakah Anda perlu melakukan
perubahan pada skrip penggunaan struktur perulangan FOR (skrip pada baris #4 – #7)
untuk menampilkan seluruh data dalam array $height dengan adanya penambahan
lima data baru? Mengapa demikian? Jelaskan! */

echo "<hr>";
$height += ["Marry" => "159", "Dony" => "160", "Benny" => "155", "Owen" => "171", "Harlan" => "180"];
foreach($height as $x => $x_value) {
echo "Key=" . $x . ", Value=" . $x_value;
echo "<br>";
}

/* 2. Buat array baru dengan nama $weight yang memiliki tiga buah data! Tampilkan
seluruh data dari array $weight dengan menggunakan stuktur perulangan FOR!
Apakah Anda membuat skrip baru untuk menampilkan seluruh array $weight
ataukah Anda cukup sedikit memofikasi skrip yang sudah ada? Mengapa demikian?
Jelaskan! */

echo "<hr>";
$weight = array("Andy"=>"50", "Barry"=>"45", "Charlie"=>"60");

foreach($weight as $n => $w){
    echo "Nama: " . $n . " memiliki berat " . $w . " kg<br>";
}
?>