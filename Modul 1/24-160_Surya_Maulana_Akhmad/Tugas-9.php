<?php 

// fungsi tanpa argumen
function sapa()  {
    echo "Hallo"."<br>";
    
}
sapa();

// fungsi dengan satu argumen
function sapa2($arg) {
    echo "Halo" . $arg . "<br>";
}
sapa2("Surya Maulana Akhmad");

// fungsi dengal lebih 1 argumen
function hitung($a, $b)  {
    echo $a + $b . "<br>";
}
hitung(10, 10);

// fungsi dengan default php
function sapa3($nama, $sapaan = "Hello")  {
    echo "$sapaan, $nama" . "<br>";
}

sapa3("Surya");

// fungsi yang mengembalikan nilai return

function jumlahkan($a, $b) {
  $hasil = $a + $b;
  return $hasil; 
}

echo jumlahkan(5, 10); 




?>