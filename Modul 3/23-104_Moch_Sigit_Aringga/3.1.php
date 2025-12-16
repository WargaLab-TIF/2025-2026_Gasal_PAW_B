<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like ".$fruits[0].", ".$fruits[1].", and ".$fruits[2].".";

echo "<br>";
echo "<br>";
echo 'tambahkan 5 data buah';
echo "<br>";

array_push($fruits, "Durian", "Pisang", "Melon", "Sirsak", "Apel");
foreach($fruits as $indx => $value) {
    echo $indx." ".$value." , ";
}


sort($fruits);

foreach($fruits as $indx => $value) {
    echo "<br>";
    echo $indx." ".$value;
}

echo "<br>";
echo "<br>";
echo "<br>";
rsort($fruits);
foreach($fruits as $indx => $value) {
    echo "<br>";
    echo $indx." ".$value;
}

echo $fruits[1];
echo "<br>";
echo "<br>";
echo count($fruits);
echo "<br>";
echo $fruits[7];
echo "<br>";
echo "<br>";

echo 'hapus satu data tertentu';
echo "<br>";
unset($fruits[2]);
echo count($fruits);    
echo "<br>";
foreach($fruits as $indx => $value) {
    echo $indx." ".$value." , ";
}

echo "<br>";
echo "<br>";
$vegies = array("Tomat", "Broccoli", "Sawi");
foreach($vegies as $indx => $value) {
    echo $indx." ".$value." , ";
}
echo "<br>";
print_r($vegies);
?>