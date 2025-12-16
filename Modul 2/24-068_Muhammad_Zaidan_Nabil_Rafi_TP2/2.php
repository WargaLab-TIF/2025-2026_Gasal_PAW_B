<?php
$jam = date("H");

if ($jam >= 8 && $jam <= 21) {
    echo "Toko buka!";
} else {
    echo "Toko tutup!";
}
?>