<?php
$letters2=['d','e','f'];

$gabungletters=array_merge($letters,$letters2);
$panjang = count($gabungletters);
for($x = 0; $x < $panjang; $x++) {
    echo $gabungletters[$x];
}
?>