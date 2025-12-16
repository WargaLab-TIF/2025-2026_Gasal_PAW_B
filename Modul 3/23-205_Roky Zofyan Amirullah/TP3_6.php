<?php
$students = array(
    array("Roky", "220401", "0812345678"),
    array("Raka", "220402", "0812345687"),
    array("Riko", "220403", "0812345665")
);

// 1. array_push()
array_push($students, array("David", "220404", "0812345111"));
echo "<b>1. Setelah array_push():</b><br>";
print_r($students);
echo "<hr>";

// 2. array_merge()
$new_students = array(
    array("Eka", "220405", "0812345222"),
    array("Fani", "220406", "0812345333")
);

$merged = array_merge($students, $new_students);
echo "<b>2. Setelah array_merge():</b><br>";
print_r($merged);
echo "<hr>";

// 3. array_values()
$values = array_values($merged);
echo "<b>3. Setelah array_values():</b><br>";
print_r($values);
echo "<hr>";

// 4. array_search()
$names = array("Roky", "Bianca", "Candice", "David", "Eka", "Fani");
$search = array_search("David", $names);
echo "<b>4. array_search('David'):</b><br>";
echo "Index dari 'David' adalah: $search";
echo "<hr>";

// 5. array_filter
$filtered = array_filter($names, function($name) {
    return strlen($name) == 3;
});
echo "<b>5. array_filter(): Nama dengan panjang > 3 huruf:</b><br>";
print_r($filtered);
echo "<hr>";

//6. Sorting
$sortNames = $names;
sort($sortNames); // urut A-Z

echo "<b>6a. sort() A-Z:</b><br>";
print_r($sortNames);
echo "<br><br>";

rsort($sortNames); // urut Z-A
echo "<b>6b. rsort() Z-A:</b><br>";
print_r($sortNames);
?>