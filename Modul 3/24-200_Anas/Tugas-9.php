<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "sebelum ditambah<br>";
foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
echo "setelah ditambah<br>";
$height['Jhonny']='200';
$height['Alex']='188';
$height['Shiny']='186';
$height['Aldo']='178';
$height['Jack']='191';
foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
} 
?>