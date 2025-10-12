<?php
$fruits = array("Avcado","Blueberry","Cherry");
$arrlength = count($fruits);

echo "<b>Array awal: </b><br>";
for($x = 0; $x < $arrlength; $x++){
    echo $fruits[$x];
    echo "<br>";
}
echo "<br>";

//soal 1
$newfruits = array("Durian","Manggis","melon","jeruk","salak");
for($i=0; $i<count($newfruits); $i++){
    array_push($fruits,$newfruits[$i]);
}
echo "<b>Array Setelah Ditambah: </b><br>";
$arrlength = count($fruits);
for($x = 0; $x < $arrlength; $x++){
    echo $fruits[$x]."<br>";
}
echo "<b>jumlah data sekarang: </b>".count($fruits)-1;

echo "<br>";
echo "<br>";

//soal 2
$vegies=array("brokoli","jamur enoki","kangkung");
$arrlength1 = count($vegies);

echo "<b>Array Baru: </b><br>";
for($j = 0; $j < $arrlength1; $j++){
    echo $vegies[$j]."<br>";
}
?>