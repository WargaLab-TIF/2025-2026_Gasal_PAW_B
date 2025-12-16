<?php
echo "<b>Preg Match </b><br>";
$name = "Irwan";
$pattern = "/^[a-zA-Z\s'-]+$/";
if (preg_match($pattern, $name)) {
    echo "Nama sesuai" . "<br>";
} else {
    echo "Nama hanya boleh berisi huruf, spasi, tanda petik, atau tanda hubung!" . "<br>";
}

echo "<b>String </b><br>";
$email = "   IRWAN@GMAIL.COM  ";
$email = trim($email);
echo $email . '<br>';
$email = strtolower($email);
echo $email . '<br>';

echo "<b>Filter </b><br>";
$email = "irwan@yahoo.com";
echo $email . '<br>';
$new = filter_var($email, FILTER_VALIDATE_EMAIL);
echo $new . '<br>';
$url = "https://google.com";
echo $url . '<br>';
$urln = filter_var($url, FILTER_VALIDATE_URL);
echo $urln . '<br>';
$ip = "192.168.10.120";
echo $ip . '<br>';
$ipn = filter_var($ip, FILTER_VALIDATE_IP);
echo $ipn . '<br>';

echo "<b>Testing </b><br>";
echo is_float(10.5) . '<br>';
echo is_int(10) . '<br>';
echo is_numeric("1000") . '<br>';
echo is_string("Haloooo") . '<br>';

echo "<b>Date </b><br>";
var_dump(checkdate(2, 12, 2005));
?>