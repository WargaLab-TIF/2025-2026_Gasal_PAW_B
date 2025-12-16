<?php

# Kode dari soal
$students = array
(
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

// 1. Menambahkan lima data baru dalam array $students!
array_push($students, 
["Samuel", "220404","0812345690"], 
["Rose", "220405","0812345685"], 
["Steve", "220406","0812345612"],
["Ruby", "220407","0812345679"],
["Sapphire", "220408","0812345634"]);

// 2. Tampilkan data dalam array $students dalam bentuk tabel!
echo "<hr>";

echo "<table border=1 cellpadding=10 cellspacing=0> 
<tr>
<th>Nama</th>
<th>NIM</th>
<th>Mobile</th>
</tr>";
foreach($students as $d){
    echo "<tr>
    <td>$d[0]</td>
    <td>$d[1]</td>
    <td>$d[2]</td>
    </tr>";
}
echo "</table>";
?>