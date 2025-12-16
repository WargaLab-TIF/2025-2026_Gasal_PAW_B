<?php
$favcolor = "red"; // untuk menyimpan warna favorit

switch ($favcolor) { // untuk memilih aksi berdasarkan nilai $favcolor
    case "red":
        echo "your favorite color is red!";
        break;
    case "blue":
        echo "your favorite color is blue";
        break;
    case "green":
        echo "your favorite color is green";
        break;
    default:
        echo "your favorite color is neither red, blue, nor green!";
}
?>