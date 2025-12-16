<!DOCTYPE html>
<html>
<head>
    <title>Process Data</title>
</head>
<body>
    <h3>Posted data:</h3>
    <div style="border:1px solid #000; padding:10px; width:400px; font-family: monospace;">
    <?php
    // Menampilkan semua data POST yang dikirim dari form
    foreach ($_POST as $key => $value) {
        echo "($key) => ($value)<br/>";
    }

    // Tambahkan validasi server-side
    require 'validate.inc'; // panggil file validasi

    echo "<hr>";

    // Lakukan validasi surname
    if (validateName($_POST, 'surname')) {
        echo "<strong>Data OK!</strong>";
    } else {
        echo "<strong>Data invalid!</strong> (Nama belakang hanya boleh huruf A–Z)";
    }
    ?>
    </div>
</body>
</html>
