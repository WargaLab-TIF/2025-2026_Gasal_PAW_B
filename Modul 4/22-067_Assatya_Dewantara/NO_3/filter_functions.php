<?php
$email = "assatya@example.com";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email valid.";
} else {
    echo "Format email tidak valid!";
}

$url = "https://www.utm.ac.id";
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "<br>URL valid.";
}

$ip = "192.168.1.1";
if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "<br>IP valid.";
}
?>
