<?php
// Modifikasi contoh percabangan untuk menampilkan grade nilai mahasiswa! (clue: tentu saja ada input dan outputnya)
$nilai = 85; 
$nama = "Rizki Pratama Sunarko"; 

if ($nilai >= 85) {
    $grade = "A";
} elseif ($nilai >= 70) {
    $grade = "B";
} elseif ($nilai >= 55) {
    $grade = "C";
} elseif ($nilai >= 40) {
    $grade = "D";
} else {
    $grade = "E";
}

echo "Nama: $nama<br>";
echo "Nilai: $nilai<br>";
echo "Grade: $grade<br>";
?>