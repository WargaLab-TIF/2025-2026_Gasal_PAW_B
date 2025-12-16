<?php
// 1. Membuat array multidimensi awal
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

// 2. Menambahkan lima data baru ke dalam array $students
$students[] = array("David", "220404", "0812345699");
$students[] = array("Edward", "220405", "0812345611");
$students[] = array("Fiona", "220406", "0812345622");
$students[] = array("George", "220407", "0812345633");
$students[] = array("Helen", "220408", "0812345644");

// 3. Menampilkan data array $students dalam bentuk tabel HTML
echo "<h3>Data Student</h3>";
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>name</th><th>NIM</th><th>mobile</th></tr>";

// loop untuk menampilkan setiap baris
for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}

echo  "</table>";
?>	
