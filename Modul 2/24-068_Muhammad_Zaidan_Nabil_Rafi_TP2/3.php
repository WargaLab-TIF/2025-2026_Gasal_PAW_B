<?php
$umur = 17;

if ($umur < 12) {
    echo "Anak-anak";
} elseif ($umur < 18) {
    echo "Remaja";
} elseif ($umur < 60) {
    echo "Dewasa";
} else {
    echo "Lansia";
}
?>