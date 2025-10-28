<?php
$name = "Assatya";
if (preg_match("/^[A-Za-z'-]+$/", $name)) {
    echo "Nama valid.";
} else {
    echo "Nama hanya boleh huruf dan tanda ' atau -.";
}
?>
