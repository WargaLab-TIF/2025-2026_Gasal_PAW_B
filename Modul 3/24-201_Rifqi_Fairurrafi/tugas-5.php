<?php
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
);

for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}

array_push($students, array("Rafi","240201","08123456123"));
array_push($students, array("Vera","240202","08123456234"));
array_push($students, array("Qiaru","240203","08123456456"));
array_push($students, array("Biru","240204","08123456678"));
array_push($students, array("Blu","240205","0812345998"));

?>

<table border="1">
    <?php
    echo "
    <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>No. Telp</th>
    </tr>
    ";
    foreach($students as $student){
        echo "<tr>";
        foreach($student as $student_value){
            echo "<td>" . $student_value . "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>