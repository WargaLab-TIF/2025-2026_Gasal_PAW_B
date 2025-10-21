<?php
$students = array(
array("Alex","220401","0812345678"),
array("Bianca","220402","0812345687"),
array("Candice","220403","0812345665"),
array("Zaki","220404","0812245611"),
array("Zaidan","220405","0822345548"),
array("Rafi","220406","0812945378"),
array("Riel","220407","0812545632"),
array("Izzul","220408","0813345956"),
);
echo "<table border='1' cellpadding='5' cellspacing='0'>";
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