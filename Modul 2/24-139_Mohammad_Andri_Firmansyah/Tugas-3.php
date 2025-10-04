<?php
$t = date("H");

if ($t < "10"){
    echo "Have a Good Morning!";
}elseif ($t < "20"){
    echo "Have a Good Day!";
}else{
    echo "Have a Good Night!";
}
?>