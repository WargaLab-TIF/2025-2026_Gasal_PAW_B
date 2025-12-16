<?php

$nilai = 50;

if ($nilai > 100 || $nilai < 0) {
    echo "Nilai tidak valid<br>";
} elseif ($nilai >= 85) {
    echo "A<br>";
} elseif ($nilai >= 70) {
    echo "B+<br>";
} elseif ($nilai >= 60) {
    echo "B<br>";
} elseif ($nilai >= 50) {
    echo "C<br>";
} else {
    echo "D<br>";
}
echo "nilai: " . $nilai;
