<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

array_push($students,
    array("David", "220404", "0812345611"),
    array("Evan", "220405", "0812345622"),
    array("Farah", "220406", "0812345633"),
    array("Grace", "220407", "0812345644"),
    array("Helen", "220408", "0812345655")
);

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nama</th><th>NIM</th><th>Mobile</th></tr>";

foreach ($students as $row) {
    echo "<tr>";
    foreach ($row as $col) {
        echo "<td>$col</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
