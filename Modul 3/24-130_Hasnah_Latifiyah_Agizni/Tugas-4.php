<?php
$height = array("andy"=>"176", "barry"=>"165", "charlie"=>"170");

foreach($height as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

//nomor 1
$height["julian"] = "180";
$height["eric"] = "172";
$height["thomas"] = "168";
$height["alex"] = "175";
$height["harry"] = "178";

echo "<h3>Nomor 1</h3>";
foreach($height as $x => $x_value) {
  echo "Key = " . $x . ", Value = " . $x_value . " cm<br>";
}

//nomor 2
$weight = array("alexa" => 65, "lisa" => 70, "marry" => 60);
echo "<h3>Nomor 2</h3>";
$keys = array_keys($weight); 
$length = count($weight);    

for ($i = 0; $i < $length; $i++) {
  echo "Key = " . $keys[$i] . ", Value = " . $weight[$keys[$i]] . " kg<br>";
}

?>