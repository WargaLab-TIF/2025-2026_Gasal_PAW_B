<?php
// Pertanyaan No 1 : Menambahkan lima data baru dalam array $students!
$students = array
(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    array("David","220404","0812345604"),
    array("Eve","220405","0812345605"),
    array("Frank","220406","0812345606"),
    array("Grace","220407","0812345607"),
    array("Heidi","220408","0812345608")
);

// Pertanyaan No 2 : Tampilkan data dalam array $students dalam bentuk tabel!
echo "<table border='1'>";
echo "<thead><tr><th>Nama</th><th>NIM</th><th>Mobile</th></tr></thead>";
echo "<tbody>";
foreach ($students as $student) {
    echo "<tr>";
    echo "<td>" . $student[0] . "</td>";
    echo "<td>" . $student[1] . "</td>";
    echo "<td>" . $student[2] . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>