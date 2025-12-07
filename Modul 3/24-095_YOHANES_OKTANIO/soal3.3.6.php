<?php

$data1 = array("Aku1","Aku2");
array_push($data1, "Aku3","Aku4");

$data2 = array("Aku5","Aku6");

$data3 = array_merge($data2, $data1);


$weight = array("Komar"=>"66","Andi"=>"60","Yohan"=>"60","Kiki" => "70","Toma"=>"80","Somo"=>"73");
$data4 = array_values($weight);

$data5 = array_search("66", $weight);

$data6 = array_filter($weight,function($val) {return $val < 70; } );

$data7asc = sort($data1);
$data8 = rsort($data1);
$data9 = asort($weight);
$data10 = arsort( $weight );
$data10 = ksort($weight);
$data11 = krsort($weight);
?>