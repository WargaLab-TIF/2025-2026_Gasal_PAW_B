<?php
$students = array
    (
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    );

$students[] = array("Budi", "220404", "0812345604");
$students[] = array("Zaka", "220405", "0812345605");
$students[] = array("Ronzi", "220406", "0812345606");
$students[] = array("Fajar", "220407", "0812345607");
$students[] = array("Syadat", "220408", "0812345608");

$lenght = count($students);
for ($row = 0; $row < $lenght; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data</title>
</head>
<body>
    <h2>Data Students</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>NIM</th>
                <th>Mobile</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rowCount = count($students);
            for ($row = 0; $row < $rowCount; $row++) {
                echo "<tr>";
                $colCount = count($students[$row]);
                for ($col = 0; $col < $colCount; $col++) {
                    echo "<td>" . $students[$row][$col] . "</td>";
                }
                echo "</tr>";
            }
            ?>
    </tbody>
</table>
</body>
</html>