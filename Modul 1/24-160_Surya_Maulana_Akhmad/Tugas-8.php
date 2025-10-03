<?php 

// bagian strlen, menghihtung panjang string
echo strlen("Surya Maulana Akhmad") . "<br>";

// menghitung jumlah kata
echo str_word_count("Surya Maulana Akhmad") . "<br>";

// membalik string
echo strrev("Surya Maulana Akhmad") . "<br>";

// mencari posisi substring
$kalimat = "Surya Maulana Akhmad";
echo strpos("$kalimat", "d") . "<br>";

// mengganti kata dalam string
$text = "Hello world!";
$newText = str_replace("world", "PHP", $text);
echo $newText; 
?>