<?php
$ulang = $_POST['ulang'];

if ($ulang == "ya") {
    echo "<h3>Silakan belanja lagi!</h3>";
    echo "<a href='tugas-10.php'>Kembali ke Menu</a>";
} else {
    echo "<h3>Terima kasih sudah berbelanja</h3>";
}
?>
