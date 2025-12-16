<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "data awal pada array height"."<br>";
foreach($height as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
echo "<br>";
$height["Faisal"] = "160";
$height["Hikari"] = "162";
$height["Deo"] = "168";
$height["Ronaldo"] = "187";
$height["Samuel"] = "172";

echo "<br>";
echo "data pada array height setelah di tambah lima data baru"."<br>";
foreach($height as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}
echo "<br>";
$weight = array("Andy"=>65, "Barry"=>70, "Charlie"=>68);
echo "data pada array weight"."<br>";
foreach($weight as $k => $v) {
    echo "Key=" . $k . ", Value=" . $v . "<br>";
}
?>
