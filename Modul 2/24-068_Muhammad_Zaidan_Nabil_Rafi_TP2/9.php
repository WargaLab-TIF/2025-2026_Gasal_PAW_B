<?php
function cekNilai($nilai) {
    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B";
    } elseif ($nilai >= 70) {
        return "C"; 
    } elseif ($nilai >= 60) {
        return "D";
    } else {
        return "E";
    }
}
echo "Nilai 95 = " . cekNilai(25) . "<br>";
echo "Nilai 72 = " . cekNilai(72) . "<br>";
echo "Nilai 50 = " . cekNilai(50) . "<br>";
?>  