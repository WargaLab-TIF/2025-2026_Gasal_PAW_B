<?php
$t = date("9");
if ($t < "10") {
    echo "Have a good moorning";
} elseif ($t < "20") {
    echo "Have a good day";
} else {
    echo "Have a good night!";
}
?>