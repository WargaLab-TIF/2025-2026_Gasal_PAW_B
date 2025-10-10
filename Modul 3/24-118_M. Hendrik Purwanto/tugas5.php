<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

$baru = array(
    array("Bagus", "220404", "0812345699"),
    array("Sari", "220405", "0812345612"),
    array("Wahyu", "220406", "0812345623"),
    array("Dewi", "220407", "0812345634"),
    array("Bima", "220408", "0812345645")
);

for ($i = 0; $i < count($baru); $i++) {
    $students[] = $baru[$i];
}

echo "<h3>Data Mahasiswa</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Nama</th><th>NIM</th><th>No. HP</th></tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
