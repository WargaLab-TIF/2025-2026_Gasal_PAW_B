<?php
$fruits = array("Avocado", "Blueberry", "Cherry");


// lima data baru
for ($i = 0; $i < 5; $i++) {
    $fruits[] = "buah" . ($i + 1);
}


// perulangan for yang sudah diperbaiki
for($x = 0; $x < count($fruits); $x++) {
    if(isset($fruits[$x])){
        echo $fruits[$x] . "<br>";
    }
}
echo "<br>";

// array baru dan ditampilkan dengan for
echo "<br>";
$vegies = array("Carrot", "Broccoli", "Spinach");
for($v = 0; $v < count($vegies); $v++) {
    echo $vegies[$v] . "<br>";
}
?>