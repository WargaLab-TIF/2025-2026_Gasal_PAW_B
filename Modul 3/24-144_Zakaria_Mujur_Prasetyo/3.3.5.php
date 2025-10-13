<?php
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
echo "<br>";
// soal 1
echo "1. Menambahkan lima data baru dalam array $ students!";
echo "<br>jawab: <br>";
$students = array_merge($students, [
    ["Dylan","220404","0812345601"],
    ["Evelyn","220405","0812345602"],
    ["Farhan","220406","0812345603"],
    ["Gita","220407","0812345604"],
    ["Hendra","220408","0812345605"],
]);

for ($i = 0, $n = count($students); $i < $n; $i++) {
    echo "Index $i: Name=" . $students[$i][0] . ", NIM=" . $students[$i][1] . ", Mobile=" . $students[$i][2] . "<br>";
}

echo "<br>";
// soal 2
echo "2. Tampilkan data dalam array $ students dalam bentuk tabel!";
echo "<br>jawab: <br>";
?>
<table border="1" cellpadding="6" cellspacing="0">
  <thead>
    <tr>
      <th>Name</th>
      <th>NIM</th>
      <th>Mobile</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0, $n = count($students); $i < $n; $i++) { ?>
      <tr>
        <td><?= htmlspecialchars($students[$i][0]) ?></td>
        <td><?= htmlspecialchars($students[$i][1]) ?></td>
        <td><?= htmlspecialchars($students[$i][2]) ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php
