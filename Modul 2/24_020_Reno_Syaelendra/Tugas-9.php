<?php
$nilai = 85;
$mahasiswa = "Reno Syaelendra";

if ($nilai >= 90) {
    $grade = "A";
    echo "Selamat $mahasiswa, Anda lulus dengan grade $grade";
} elseif ($nilai >= 80) {
    $grade = "B";
    echo "Selamat $mahasiswa, Anda lulus dengan grade $grade";
} elseif ($nilai >= 70) {
    $grade = "C";
    echo "Selamat $mahasiswa, Anda lulus dengan grade $grade";
} elseif ($nilai >= 60) {
    $grade = "D";
    echo "Maaf $mahasiswa, Anda tidak lulus dengan grade $grade";
} else {
    $grade = "E";
    echo "Maaf $mahasiswa, Anda tidak lulus dengan grade $grade";
}
?>