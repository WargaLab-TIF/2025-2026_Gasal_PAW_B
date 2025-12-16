<?php

$des = 3.14;
$ang = 123;
$nom = "4321";
$hur = "Halo";

if (is_float($des)) {
    echo "float <br>";
} else {
    echo "bukan float <br>";
}

if (is_int($ang)) {
    echo "integer <br>";
} else {
    echo "bukan integer <br>";
}

if (is_numeric($nom)) {
    echo "numeric <br>";
} else {
    echo "bukan numeric <br>";
}

if (is_string($hur)) {
    echo "string <br>";
} else {
    echo "bukan string <br>";
}

?>