<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Andy is " . $height['Andy'] . " cm tall.";

echo "<br>";
echo "<br>";
echo "data awal pada array height <br>";
foreach($height as $nama => $tinggi){
    echo "$nama:$tinggi";
    echo "<br>";
}

$height["Faisal"] = "160";
$height["Hikari"] = "162";
$height["Deo"] = "168";
$height["Ronaldo"] = "187";
$height["Samuel"] = "172";

echo "<br>";

echo "data pada array height setelah ditambah lima data baru <br>";
foreach($height as $nama => $tinggi){
    echo "$nama:$tinggi";
    echo "<br>";
}
$keys = array_keys($height);
echo "indeks terakhir: " . end($keys) . "<br>";
echo "<br>";

echo "data pada array height setelah satu data dihapus <br>";
unset($height["Samuel"]);
foreach($height as $nama => $tinggi){
    echo "$nama:$tinggi";
    echo "<br>";
}
$keys = array_keys($height);
echo "Setelah dihapus, indeks terakhir: " . end($keys) . "<br>";
echo "<br>";

$weight = array("Andy"=>65, "Barry"=>70, "Charlie"=>68);
echo "data pada array height setelah satu data dihapus <br>";
unset($weight["Samuel"]);
foreach($weight as $nama => $berat){
    echo "$nama:$berat";
    echo "<br>";
}
echo "Data kedua dari array weight: " . $weight["Barry"];
?>
