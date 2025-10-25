<?php
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665")
);

for($row=0; $row<3; $row++){
    echo"<b>Row number $row</b>";
    echo "<ul>";
    for ($col=0; $col<3; $col++){
        echo "<li>". $students[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "<br>";

//soal 1
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    array("izza","220404","0812345668"),
    array("rika","220405","0812345679"),
    array("olif","220406","0812345689"),
    array("layla","220407","0812345610"),
    array("mailal","220408","0812345611")
);

foreach($students as $mahasiswa){
    echo "Nama: $mahasiswa[0], NIM: $mahasiswa[1], No: $mahasiswa[2]<br>";
}

echo "<br>";

//soal 2
echo "<h3>Daftar Data Mahasiswa</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr>
        <th>No</th>
        <th>Name</th>
        <th>NIM</th>
        <th>Mobile</th>
      </tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    echo "<td>" . ($row + 1) . "</td>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>