<?php
$nama = "sabrina";  // string
$umur = "20";       // integer
$tinggi = "165";    // float
$isMahasiswa = "true";  // boolean

echo "nama: $nama <br>";
echo "umur: $umur <br>";
echo "tinggi: $tinggi meter<br>";
echo "mahasiswa? " . ($isMahasiswa ? "ya" : "tidak"); // ternary operator = shortcut if-else
?>