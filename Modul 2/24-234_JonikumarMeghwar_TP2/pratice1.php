<?php
$s = -1;
if ($s >= 90 &&   $s < 100  ){
    echo "Grade A+";
}elseif ($s > 100 || $s <0 ) {
    echo "Try again";
}
elseif ($s >= 80) {
    echo "Grade A!";
}elseif ($s >= 70) {
    echo "Grade B!";
}elseif ($s >= 60) {
    echo "Grade C!";
}elseif ($s >= 50) {
    echo "Grade D!";
}
elseif ($s >= 40) {
    echo "Grade E!";
}
elseif ($s < 40 ) {
    echo "Fail!";
}

   $input = trim(fgets(STDIN));
   echo $input;
?>