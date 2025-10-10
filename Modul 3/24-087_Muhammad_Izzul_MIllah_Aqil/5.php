<?php
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    array("izzul","240404","0812345611"),
    array("zaidan","240405","0812345622"),
    array("verdi","240406","0812345633"),
    array("zaki","240407","0812345644"),
    array("rafi","240408","0812345655")
);

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>".$students[$row][$col]."</td>";
    }
    echo "</tr>";
}
echo "</table>";