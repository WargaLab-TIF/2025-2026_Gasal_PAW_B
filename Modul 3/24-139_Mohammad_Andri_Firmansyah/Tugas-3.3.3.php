<?php

# Kode dari soal
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";

/* 1. Menambahkan lima data baru dalam array $height! Tampilkan nilai dengan indeks
terakhir dari array $height! */
echo "<hr>";
$height += ["Marry" => "159", "Dony" => "160", "Benny" => "155", "Owen" => "171", "Harlan" => "180"];
$counter = 0;
$last_index = count($height) - 1;
foreach($height as $nm => $h) {
    if ($counter == $last_index) {
        echo $nm." dengan tinggi ".$h." cm berada pada index ".$counter;
    }
    $counter++;
};

/* 2. Hapus satu data tertentu dari array $height! Tampilkan nilai dengan indeks terakhir
dari array $height! */

echo "<hr>";
unset($height["Barry"]);
$counter = 0;
$last_index = count($height) - 1;
foreach($height as $nm => $h) {
    if ($counter == $last_index) {
        echo $nm." dengan tinggi ".$h." cm berada pada index ".$counter;
    }
    $counter++;
};

/* 3. Buat array baru dengan nama $weight yang memiliki tiga buah data! Tampilkan data
kedua dari array $weight! */
echo "<hr>";
$weight = array("Andy"=>"50", "Barry"=>"45", "Charlie"=>"60");

foreach($weight as $n => $w){
    echo "Nama: " . $n . " memiliki berat " . $w . " kg<br>";
}
?>