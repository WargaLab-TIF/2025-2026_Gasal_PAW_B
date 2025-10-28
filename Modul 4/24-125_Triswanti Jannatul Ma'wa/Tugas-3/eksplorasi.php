<?php
// Soal 1
echo"<b>1.Regular expression: </b>";
$nim = "240411100125";

if (preg_match("/^[0-9]{8,12}$/", $nim)) {
    echo "NIM valid";
} else {
    echo "NIM tidak valid";
}

echo"<br>";
// Soal 2
echo"<b>2.String: </b>";
$nama = "  Andi";
$nama = trim($nama);         
$nama = strtoupper($nama);

echo $nama;

echo"<br>";
// Soal 3
echo"<b>3.Filter: </b>";
$email = "andi@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email valid";
} else {
    echo "Email tidak valid";
}

echo"<br>";
// Soal 4
echo"<b>4.Type testing: </b>";
$umur = 20;
if (is_int($umur)) {
    echo "Umur berupa integer";
} else {
    echo "Umur bukan integer";
}

echo"<br>";
// Soal 5
echo"<b>5.Data validation: </b>";
$tanggal = 13;
$bulan = 9;
$tahun = 2025;
if (checkdate($bulan, $tanggal, $tahun)) {
    echo "Tanggal valid";
} else {
    echo "Tanggal tidak valid";
}

