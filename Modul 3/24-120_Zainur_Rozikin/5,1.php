<?php
$students = [
    ["Alex", "220401", "0812345678"],
    ["Bianca", "220402", "0812345687"],
    ["Candice", "220403", "0812345665"],
    
];

array_push($students,
["Dani", "220404", "0812345654"],
["Ema", "220405", "0812345643"],
["Franky", "220406", "0812345632"],
["Grecia", "220407", "0812345621"],
["Hayooo", "220408", "0812345610"],
);

for ($row = 0; $row < count($students); $row++) {
    echo "<p><b>Row number " . ($row + 1) . "</b></p>";
    echo "<ul>";
    for ($col = 0; $col < count($students[$row]); $col++) {
        echo "<li>" . $students[$row][$col] . "</li>";
    }
    echo "</ul>";
}
