<?php
$students = array
    (
        array("alex", "220401", "0812345678"),
        array("bianca", "220402", "0812345687"),
        array("candice", "220403", "0812345665")
    );
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

$students[] = array("julian", "220404", "0812345611");
$students[] = array("eric", "220405", "0812345622");
$students[] = array("thomas", "220406", "0812345633");
$students[] = array("alex", "220407", "0812345644");
$students[] = array("harry", "220408", "0812345655");

echo "<h3>Data Mahasiswa</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Mobile</th>
      </tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>