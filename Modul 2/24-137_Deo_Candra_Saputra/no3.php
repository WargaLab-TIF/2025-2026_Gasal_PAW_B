<?php
$t=date("H");
if ($t<"10"){
    echo "Haven a good morning!";
}elseif ($t<"20"){
    echo "Haven a good day!";
}else{
    echo "Have a good night!";
}
?>