<?php
$nilai = 85; // untuk menyimpan nilai angka

if ($nilai >= 90) { // jika nilai 90 ke atas
    $grade = "A"; // grade A
} elseif ($nilai >= 80) { // jika nilai 80–89
    $grade = "B"; // grade B
} elseif ($nilai >= 70) { // jika nilai 70–79
    $grade = "C"; // grade C
} elseif ($nilai >= 60) { // jika nilai 60–69
    $grade = "D"; // grade D
} else { // jika di bawah 60
    $grade = "E"; // grade E
}

echo "nilai anda: $nilai <br>"; // untuk menampilkan nilai
echo "grade anda: $grade"; // untuk menampilkan grade
?>
