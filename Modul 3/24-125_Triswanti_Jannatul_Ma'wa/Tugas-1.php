<?php

$fruits=array("Avocado","Bluberry","Charry");
echo "i like $fruits[0],$fruits[1], and $fruits[2]";

//soal 1
echo "<p>";
array_push($fruits,"Durian","Melon","Anggur");
echo "<b>buah ditambahkan:</b> $fruits[3],$fruits[4],$fruits[5]";

echo "<br>";
echo "<b>data keseluruhan</b>: ";
foreach($fruits as $buah){
    echo $buah.",";
}

echo "<br>";
$indeks = count($fruits)-1;
echo "<b>indeks tertinggi yaitu: </b>$indeks";

echo "<p>";

//soal 2
$removearray=array_pop($fruits);
echo "<b>data yang dihapus: </b>$removearray";

echo "<br>";
echo "<b>data setelah dihapus:</b>";
foreach($fruits as $remove){
    echo " $remove, ";
}

echo "<br>";
$index = count($fruits)-1;
echo "<b>indeks tertinggi yaitu: </b>$index";

echo "<p>";

//soal 3
$vegies=array("brokoli","jamur enoki","kangkung");
echo "<b>data sayur: </b>";
foreach($vegies as $sayur){
    echo $sayur.",";
}
?>