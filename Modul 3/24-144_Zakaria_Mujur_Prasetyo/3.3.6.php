<?php
// 1) array_push
echo "1) array_push()<br>";
$buah = ["apel", "pisang"];
array_push($buah, "ceri");
echo "Hasil: " . implode(", ", $buah) . "<br><br>";

// 2) array_merge
echo "2) array_merge()<br>";
$a = [1, 2]; $b = [3, 4];
$gabung = array_merge($a, $b);
echo "Hasil: " . implode(", ", $gabung) . "<br><br>";

// 3) array_values
echo "3) array_values()<br>";
$orang = ["id"=>10, "nama"=>"Ana"];
$nilai = array_values($orang);
echo "Hasil: " . implode(", ", $nilai) . "<br><br>";

// 4) array_search
echo "4) array_search()<br>";
$warna = ["merah", "hijau", "biru"];
$pos = array_search("hijau", $warna);
echo "Index 'hijau': " . ($pos === false ? "tidak ada" : $pos) . "<br><br>";

// 5) array_filter
echo "5) array_filter()<br>";
$angka = [1,2,3,4,5,6];
$genap = array_values(array_filter($angka, function($n){ return $n % 2 == 0; }));
echo "Genap: " . implode(", ", $genap) . "<br><br>";

// 6) Sorting
echo "6) Sorting<br>";
$bilangan = [5,2,8,1];
$naik  = $bilangan; sort($naik);    // kecil -> besar
$turun = $bilangan; rsort($turun);  // besar -> kecil
echo "sort (naik): "  . implode(", ", $naik) . "<br>";
echo "rsort (turun): " . implode(", ", $turun) . "<br>";

$assoc = ["c"=>3, "a"=>1, "b"=>2, "d"=>4];
$key = $assoc; ksort($key);   // urut key
$value = $assoc; asort($value);   // urut nilai
echo "ksort (key): ";
foreach ($key as $k=>$v) echo "$k=$v ";
echo "<br>asort (nilai): ";
foreach ($value as $k=>$v) echo "$k=$v ";
?>