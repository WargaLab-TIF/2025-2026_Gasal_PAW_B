<?php
#3.3.5.1
echo "<b>Soal 3.3.5.1</b> <br>";
$students = array (
    array("Alex","220401","081234567"),
    array("Budi","220402","081234568"),
    array("Charlie","220403","081234569"),
);
array_push($students,
    array("Daniel", "220404", "0812345699"),
    array("Eka", "220405", "0812345611"),
    array("Farah", "220406", "0812345622"),
    array("Gilang", "220407", "0812345633"),
    array("Hana", "220408", "0812345644")
);

for ($row = 0; $row < count($students);$row++) {
    echo"<p>Row number " . ($row + 1) . ":</p>";
    echo "<ul>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}


#3.3.5.2
echo "<b>Soal 3.3.5.2</b> <br>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Name</th><th>NIM</th><th>Nomor HP</th></tr>";

foreach ($students as $student) {
    echo "<tr>";
    foreach ($student as $data) {
        echo "<td>$data</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>