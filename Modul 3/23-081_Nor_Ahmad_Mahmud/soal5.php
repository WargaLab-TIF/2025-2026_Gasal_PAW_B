<?php
$student =array(
    array("Alex","22041","081234567890",),
    array("Bianca","22042","081234567891",),
    array("Candice","22043","081234567892",)
    );
array_push($student,
    array("Dani","22044","081234567893"),
    array("Ella","22045","081234567894"),
    array("Fiona","22046","081234567895"),
    array("George","22047","081234567896"),
    array("Hannah","22048","081234567897")
);
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Name</th>
        <th>ID</th>
        <th>Phone</th>
      </tr>";

for($row=0; $row < count($student); $row++){
    echo "<tr>";
    echo "<td>".($row+1)."</td>"; // nomor urut
    for($col=0; $col < count($student[$row]); $col++){
        echo "<td>".$student[$row][$col]."</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>