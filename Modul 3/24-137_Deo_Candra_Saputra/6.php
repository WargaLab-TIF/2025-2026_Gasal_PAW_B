<?php
$arr1 = array("Ferrari", "Lamborghini");
$arr2 = array("Rolls-Royce", "Aston Martin", "Bentley");
echo "<p><b>dua array yang berisi data awal<br></b></p>";
var_dump($arr1);   
echo "<br>";
var_dump($arr2);      
echo "<br>";
echo "<p><b>array pertama dilakukan array_push atau tambah data<br></b></p>";

array_push($arr1, "Porsche");
print_r($arr1);
echo "<br>";

echo "<p><b>kedua array dilakukan array_merge atau pengabungan data<br></b></p>";
$merged = array_merge($arr1, $arr2);
print_r($merged);
echo "<br>";

echo "<p><b>dilakukan perintah array_values atau menata ulang indeks pada array yang telah digabungkan <br></b></p>";
$values = array_values($merged);
print_r($values);
echo "<br>";


echo "<p><b>pada array yang sudah digabungkan dilakukan array_search atau pencarian pada data<br></b></p>";
$find = array_search("Rolls-Royce", $merged);
echo "Index Rolls-Royce: $find<br>";
echo "<br>";

echo "<p><b>pada array yang sudah digabungkan dilakukan array_filter atau penyaringan data berdasarkan panjang string <br></b></p>";
$filtered = array_filter($merged, function($mobil){
    return strlen($mobil) > 7;
});
print_r($filtered);
echo "<br>";
echo "<br>";

echo "<p><b>Pada array yang telah digabungkan dilakukan perintah sort() untuk mengurutkan data secara menaik berdasarkan abjad<br></b></p>";
sort($merged);
print_r($merged);
?>