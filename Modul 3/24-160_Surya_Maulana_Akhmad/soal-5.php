<?php

$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);

$students = array_merge($students, array(
    array("Surya", "220401", "0812345678"),
    array("Maulana", "220401", "0812345678"),
    array("Akhmad", "220401", "0812345678"),
    array("Zidan", "220401", "0812345678"),
    array("Perkasa", "220401", "0812345678")
));


for ($row = 0; $row < 8; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

// tampilan dalam bentuk tabel

echo "<p><b>Student Tabel </b></p>";
echo "<table border='1'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>NIM</th>";
echo "<th>Mobile</th>";
echo "</tr>";
for ($row = 0; $row < 8; $row++) {
    echo "<tr>";
    for ($col = 0; $col <= 2; $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
