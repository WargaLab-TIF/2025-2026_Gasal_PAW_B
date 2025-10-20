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
$students[] = ['Buddy','220404','084682537366'];
$students[] = ['Kevin','220405','084682968576'];
$students[] = ['Alicia','220406','084682535511'];
$students[] = ['Buddy','220407','085689037366'];
$students[] = ['Sandy','220408','0892228898222'];

?>
