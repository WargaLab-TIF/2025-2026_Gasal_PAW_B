<!-- 
• strlen() → menghitung panjang string.
• str_word_count() → menghitung jumlah kata.
• strrev() → membalik string.
• strpos() → mencari posisi substring.
• str_replace() → mengganti kata dalam string. 
-->

<?php

$str_eg = "Lorem ipsum Dolor is amet ini contoh saja.";
echo "Text Asli: ".$str_eg . "<br>";
echo "Panjang text: ".strlen($str_eg) . "<br>";
echo "Panjang kata: ".str_word_count($str_eg) . "<br>";
echo "Membalik text: ".strrev($str_eg) . "<br>";
echo "Posisi Substring: ".strpos($str_eg,"D") . "<br>"; // menghasilkan index D "Dolor" kalau dari text ku
echo "Mengganti text: ".str_replace("Lorem","Uciha",$str_eg) . "<br>";
?>
