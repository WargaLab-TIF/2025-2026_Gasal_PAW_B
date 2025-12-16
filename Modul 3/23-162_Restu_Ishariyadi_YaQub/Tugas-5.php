<?php
$students = array
(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
);

// 1. Menambahkan lima data baru
$students[] = array("David","220404","0811111111");
$students[] = array("Ethan","220405","0822222222");
$students[] = array("Frank","220406","0833333333");
$students[] = array("George","220407","0844444444");
$students[] = array("Harry","220408","0855555555");

// 2. Tampilkan data dalam bentuk tabel HTML
echo "<h2>Data Mahasiswa</h2>";
echo "<table border='1' style='border-collapse: collapse;' cellpadding='5'>";
echo "<tr><th>Nama</th><th>NIM</th><th>Mobile</th></tr>";

// Menggunakan nested loop
foreach ($students as $baris_mahasiswa) {
    echo "<tr>";
    foreach ($baris_mahasiswa as $data_sel) {
        echo "<td>" . $data_sel . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>