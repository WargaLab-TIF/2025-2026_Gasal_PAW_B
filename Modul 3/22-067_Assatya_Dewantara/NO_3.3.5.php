<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa (Array Multidimensi)</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ccc;
        }
    </style>
</head>
<body>

<h2>Data Mahasiswa</h2>

<?php
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    array("Darren","220404","0812345699"),
    array("Elena","220405","0812345600"),
    array("Felix","220406","0812345611"),
    array("Grace","220407","0812345622"),
    array("Hannah","220408","0812345633")
);

echo "<table>";
echo "<tr><th>No</th><th>Nama</th><th>NIM</th><th>No. HP</th></tr>";

// Menampilkan semua data menggunakan looping
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

</body>
</html>
