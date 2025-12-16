<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);

array_push(
    $students,
    array("irwan", "240422", "0812345902"),
    array("Ali", "220491", "0812391678"),
    array("Adi", "220341", "0812981678"),
    array("Amin", "250241", "0832546678"),
    array("Deo", "240611", "0852345678"),
);
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>No</th><th>Nama</th><th>NIM</th><th>No. HP</th></tr>";
for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    echo "<td>" . ($row + 1) . "</td>";
    echo "<td>" . $students[$row][0] . "</td>";
    echo "<td>" . $students[$row][1] . "</td>";
    echo "<td>" . $students[$row][2] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>