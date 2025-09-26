<?php
$a = "Lorem ipsum dolor sit amet";

echo "Teks: $a<br>";
echo "strlen(): " . strlen($a) . " karakter<br>";
echo "str_word_count(): " . str_word_count($a) . " kata<br>";
echo "strrev(): " . strrev($a) . "<br>";
echo "strpos(): posisi kata 'ipsum' = " . strpos($a, "ipsum") . "<br>";
echo "str_replace(): " . str_replace("ipsum", "XYZ", $a);
?>