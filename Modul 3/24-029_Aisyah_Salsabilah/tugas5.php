<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Budi", "220402", "0812345687"),
    array("Cindy", "220403", "0812345665"),
    array("Dina", "220404", "0812345690"),
    array("Evan", "220405", "0812345600"),
    array("Farah", "220406", "0812345611"),
    array("Gilang", "220407", "0812345622"),
    array("Hana", "220408", "0812345633")
);

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
foreach($students as $row){
    echo "<tr>";
    foreach($row as $data){
        echo "<td>$data</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>