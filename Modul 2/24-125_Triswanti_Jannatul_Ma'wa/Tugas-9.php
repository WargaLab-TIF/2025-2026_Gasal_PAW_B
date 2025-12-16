<?php
$nilai = 78;

if ($nilai >= 1 && $nilai < 50) {
    echo "nilai D";
} elseif ($nilai >= 50 && $nilai < 75) {
    echo "nilai C";
} elseif ($nilai >= 75 && $nilai < 85) {
    echo "nilai B";
} elseif ($nilai >= 85 && $nilai <= 100) {
    echo "nilai A";
} else {
    echo "nilai tidak valid";
}
?>
