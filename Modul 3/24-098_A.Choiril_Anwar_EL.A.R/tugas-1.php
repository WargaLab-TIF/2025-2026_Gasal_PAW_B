<?php
//disoal nya
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";

//nambah 5 buah
array_push($fruits, "Durian", "Elderberry","Apel","Mangga","Jeruk");
//nampilin index tertinggi
$nilai_index=$fruits[$index-1];
echo "$nilai_index";
//nampilin berapa index
$index = count($fruits);
echo "index : $index <br>";

// hapus 1 data
unset($fruits[7]);
$index = count($fruits);
echo "index : $index <br>";
$nilai_index=$fruits[$index-1];
echo "$nilai_index";

//buat array baru isinya 3 data dan nampilin semua isinya
$vegies = array("Bayam", "Kangkung", "Lobak");
foreach($vegies as $vegie){
    echo "<br> $vegie";
}
?>