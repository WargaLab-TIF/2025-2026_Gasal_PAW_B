<?php
$arrayAsli = ['a', '', 'b', 0, 'c', null, 'd', false];
$arrayBersih = array_filter($arrayAsli);
print_r($arrayBersih);
?>