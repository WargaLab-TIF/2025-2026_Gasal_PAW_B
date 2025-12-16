<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665"),
);
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}

echo "<br>";
echo 'nomor 1';
echo "<br>";
array_push($students, array("Keke", "23045556", "0812345678"));
array_push($students, array("Revi", "23045588", "0812345696"));
array_push($students, array("Lina", "23045597", "0812345644"));
array_push($students, array("Dani", "23045563", "0812345645"));
array_push($students, array("Hannah", "23045542", "0812345663"));


echo 'nomor2';
echo "<table border='1' cellspacing='0' cellpadding='5'>";
echo "<tr>
        <th>Name</th>
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
