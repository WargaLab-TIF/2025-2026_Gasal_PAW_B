<?php
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
);

array_push($students, array("Riel", "240098", "0819998766"), 
array("EL", "240000", "0812345678"), array("Ruel", "180407", "0887654321"), 
array("Aeron", "250098", "0898765421"), array("Jeki", "100409", "0812456789"));


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
?>
