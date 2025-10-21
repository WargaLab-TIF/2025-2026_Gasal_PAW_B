<?php
$jam = date("H");

if ($jam >= 5 && $jam <= 17) {
    echo "Selamat Siang!";
} else {
    echo "Selamat Malam!";
}
?>