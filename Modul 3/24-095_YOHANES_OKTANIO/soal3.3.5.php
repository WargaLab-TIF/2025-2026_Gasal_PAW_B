<?php
$students = array(array("Alex", "220401", "0812345678"), array("Bianca", "220402", "0812345687"), array("Candice", "220403", "0812345665"),array("Hanes", "220405", "0812345610"),array("Kome", "230403", "0812345620"),array("Karim", "220408", "0812345675"),array("Torip", "220404", 
"0812345666"),array("Jamin", "220408", "0812345611") );

?>

<table border="1">
    <tr>
        <th>Name</th>
        <th>NIM</th>
        <th>Mobile</th>
    </tr>

<?php
for ($row = 0; $row < 8; $row++) {

    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}
?>

</table>