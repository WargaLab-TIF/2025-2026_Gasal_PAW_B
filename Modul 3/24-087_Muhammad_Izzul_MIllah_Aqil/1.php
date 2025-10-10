<?php

$fruits = array("Avocado", "Blueberry", "Cherry");

array_push($fruits, "Durian", "Mangga", "pisang", "Apel", "naga");

var_dump($fruits); 

$Indexterakhir = count($fruits) - 1;
echo "<br>Nilai indeks tertinggi: " . $fruits[$Indexterakhir];
echo "<br>Indeks tertinggi: " . $Indexterakhir;

echo "<br>";
echo "<br>";

unset($fruits[2]); 
$fruits = array_values($fruits);

var_dump($fruits);
$indextrkhr = count($fruits) - 1;
echo "<br>Nilai indeks tertinggi: " . $fruits[$indextrkhr];
echo "<br>Indeks tertinggi: " . $indextrkhr;


echo "<br><br>";


$vegies = array("wortel", "bayam", "brokoli");

echo "<br>Data sayuran:<br>";
foreach ($vegies as $veg) {
    echo $veg . "<br>";
}


