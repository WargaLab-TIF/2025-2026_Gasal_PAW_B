<?php
$txt = "Deo Candra Saputra";

echo "panjang string " . strlen($txt) . "<br>";
echo "jumlah kata " . str_word_count($txt) . "<br>";
echo "membalik string " . strrev($txt) . "<br>";
echo "mencari posisi string " . strpos($txt, "Can") . "<br>";
echo "mengganti string " . str_replace("Deo", "Dio", $txt) . "<br>";
?>