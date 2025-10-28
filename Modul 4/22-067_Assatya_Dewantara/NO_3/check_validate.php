<?php
$month = 2;
$day = 29;
$year = 2025;

if (checkdate($month, $day, $year)) {
    echo "Tanggal valid.";
} else {
    echo "Tanggal tidak valid!";
}
?>
