<?php
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665")
);

echo "<p><b>Data awal pada array students</b></p>";
for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
    echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}
$new1= array ("Dani","220404","0812345611");
$students[]=$new1;
$new2= array ("Deo","220405","0812356743");
$students[]=$new2;
$new3= array ("Hikari","220406","0812283645");
$students[]=$new3;
$new4= array ("Faisal","220407","0814391538");
$students[]=$new4;
$new5= array ("Samuel","220408","0812934031");
$students[]=$new5;

echo "<br>";
echo "<p><b>Data pada array students setelah ditambah lima data baru</b></p>";
for ($row = 0; $row < count($students); $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}

echo "<br>";
echo "<p><b>Data pada array students setelah ditambah lima data baru dan di ubah dalam bentuk tabel</b></p>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>".$students[$row][$col]."</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
