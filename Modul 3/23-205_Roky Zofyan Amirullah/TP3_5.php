<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

$students[] = array("David", "220404", "0812345111");
$students[] = array("Eka", "220405", "0812345222");
$students[] = array("Fani", "220406", "0812345333");
$students[] = array("Gilang", "220407", "0812345444");
$students[] = array("Hana", "220408", "0812345555");
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";

for ($i = 0; $i < count($students); $i++) {
    echo "<tr>";
    echo "<td>" . $students[$i][0] . "</td>";
    echo "<td>" . $students[$i][1] . "</td>";
    echo "<td>" . $students[$i][2] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
