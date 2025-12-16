<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

// menambah lima data baru
$height["Karim"] = "180";
$height["Adi"] = "181";
$height["Frank"] = "168";
$height["Sinatra"] = "185";
$height["Wawan"] = "177";
echo "Nilai dengan indeks terakhir : " . end($height) . "<br><br>";

// hapus satu data tertentu
unset($height["Charlie"]);
echo "Nilai terakhir setelah 'Charlie' dihapus: " . end($height) . "<br><br>";

// membuat array baru dan menampilkan data kedua
$weight = array("Andy"=>"68", "Barry"=>"60", "Charlie"=>"65");
echo "Data kedua dari array \$weight kata kunci Barry: " . $weight["Barry"];