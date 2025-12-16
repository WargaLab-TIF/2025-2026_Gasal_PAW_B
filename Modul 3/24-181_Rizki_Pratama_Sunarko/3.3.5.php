<?php
$students = array
(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    );

// 1. Menambahkan lima data baru dalam array $students!
$students[] = array("Rizki","240411100181","085708350575");
$students[] = array("Budi","240411100155","085708350456");
$students[] = array("Rozi","240411100145","085704567898");
$students[] = array("Syadat","240411100166","085708550123");
$students[] = array("Zakaria","240411100144","085745350789");

// Tampilkan data dalam array $students dalam bentuk tabel!
echo "<h3>Data Students</h3>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nomor HP</th>
    </tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    echo "<td>" . ($row + 1) . "</td>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>".$students[$row][$col]."</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>

