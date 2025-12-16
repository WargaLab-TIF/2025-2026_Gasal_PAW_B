<?php

$password = "abcDEF123";
$pattern = "/^[a-zA-Z0-9]+$/";

if (preg_match($pattern, $password)) {
    echo "Password valid";
} else {
    echo "Password tidak valid";
}

?>