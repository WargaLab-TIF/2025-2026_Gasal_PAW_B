<?php

$bulan = 12;
$hari = 13;
$tahun = 2005;

if (checkdate($bulan, $hari, $tahun)) {
    echo "Tanggal valid <br>";
} else {
    echo "Tanggal tidak valid <br>";
}

?>