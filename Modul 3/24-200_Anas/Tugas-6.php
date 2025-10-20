<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";
echo "<br>";

$height['Jhonny']='200';
$height['Alex']='188';
$height['Shiny']='186';
$height['Aldo']='178';
$height['Jack']='191';

echo 'ini nilai terakhir sebelum di hapus ' . end($height);
echo "<br>";
?>