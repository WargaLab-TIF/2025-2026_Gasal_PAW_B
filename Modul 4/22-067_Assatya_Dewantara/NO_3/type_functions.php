<?php
$value1 = 123;
$value2 = "123.45";

if (is_int($value1)) echo "value1 adalah integer<br>";
if (is_numeric($value2)) echo "value2 adalah numerik<br>";
if (is_string($value2)) echo "value2 juga string (berisi angka)";
?>
