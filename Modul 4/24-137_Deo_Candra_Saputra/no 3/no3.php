<?php
$nama = "Deo Candra";
$email = "  CANDRADIO90@GMAIL.COM ";
$umur = "19";
$tanggal_lahir = "2006-07-18"; 
$ip_address = "192.168.0.1";
$url = "https://www.trunojoyo.ac.id";

// SOAL 3.1 

echo "<b>Soal 3.1 – Regular Expression (preg_match)</b><br>";
$pattern = "/^[a-zA-Z ]+$/"; 
if (preg_match($pattern, $nama)) {
    echo " Nama valid: $nama<br><br>";
} else {
    echo " Nama tidak valid: hanya boleh huruf & spasi.<br><br>";
}

// SOAL 3.2 

echo "<b>Soal 3.2 – String Functions (trim, strtolower, strtoupper)</b><br>";
echo "Sebelum trim: '$email'<br>";
$email = trim($email); 
echo "Setelah trim: '$email'<br>";
$email_lower = strtolower($email);
$email_upper = strtoupper($email); 
echo "Huruf kecil semua: $email_lower<br>";
echo "Huruf besar semua: $email_upper<br><br>";

// SOAL 3.3 

echo "<b>Soal 3.3 – Filter Functions (filter_var)</b><br>";
if (filter_var($email_lower, FILTER_VALIDATE_EMAIL)) {
    echo " Email valid: $email_lower<br>";
} else {
    echo " Email tidak valid<br>";
}

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo " URL valid: $url<br>";
} else {
    echo " URL tidak valid<br>";
}

if (filter_var($ip_address, FILTER_VALIDATE_IP)) {
    echo " IP valid: $ip_address<br><br>";
} else {
    echo " IP tidak valid<br><br>";
}

$input_email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
$input_url = filter_input(INPUT_GET, 'url', FILTER_VALIDATE_URL);
$input_ip = filter_input(INPUT_GET, 'ip', FILTER_VALIDATE_IP);
$float_value = "45.67";
if (filter_var($float_value, FILTER_VALIDATE_FLOAT)) {
    echo " Nilai float valid: $float_value<br><br>";
} else {
    echo " Nilai float tidak valid<br><br>";
}

// SOAL 3.4 

echo "<b>Soal 3.4 – Type Testing (is_int, is_float, is_numeric, is_string)</b><br>";
echo "Nilai umur: $umur<br>";
if (is_numeric($umur)) {
    echo " Umur berupa angka<br>";
} else {
    echo " Umur harus berupa angka<br>";
}
if (is_string($nama)) {
    echo " Nama bertipe string<br>";
}
if (is_int((int)$umur)) {
    echo " Umur bisa dikonversi ke integer<br>";
}
if (is_float((float)$float_value)) {
    echo " Nilai berupa float<br><br>";
}

// SOAL 3.5 
echo "<b>Soal 3.5 – Date Validation (checkdate)</b><br>";
list($tahun, $bulan, $tanggal) = explode('-', $tanggal_lahir);
if (checkdate($bulan, $tanggal, $tahun)) {
    echo " Tanggal valid: $tanggal_lahir<br>";
} else {
    echo " Tanggal tidak valid: $tanggal_lahir<br>";
}
?>
