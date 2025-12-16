<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I Like " . $fruits[0] . ", " . $fruits[1] ,", And " . $fruits[2] . "." ;

array_push($fruits, "Manggo", "Watermelon", "Apple", "Starfruit", "Devil Fruit");

echo "<br> 
<b>Setelah ditambahkan 5 buah baru : </b> <br>";
echo "I Like " . $fruits[3] . ", " . $fruits[4] ,", And " . $fruits[5] . "." ;


array_pop($fruits);
echo "<br> <b>Setelah menghapus 1 buah terakhir : </b> <br>";
echo "I Like " . $fruits[3] . ", " . $fruits[4] ,". <br>" ;
echo "Index tertinggi/terakhir : 6 <br>";

$veggies = ["Carrot", "Cabbages", "Brocoli"];
echo "<br><b>Array veggies : </b><br>";
var_dump($veggies);
?>