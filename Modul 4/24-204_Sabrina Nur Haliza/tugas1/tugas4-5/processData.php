<!DOCTYPE html>
<html>
<head>
    <title>Process Data</title>
</head>
<body>
    <h3>Posted data:</h3>
    <div style="border:1px solid #000; padding:10px; width:400px; font-family: monospace;">
    <?php
    require 'validate.inc';

    // tampung error
    $errors = array();

    // jalankan validasi
    validateName($errors, $_POST, 'surname');

    // tampilkan hasil
    if ($errors) {
        echo "<strong>Errors:</strong><br/>";
        foreach ($errors as $field => $error) {
            echo "$field $error<br/>";
        }
    } else {
        echo "<strong>Data OK!</strong>";
    }
    ?>
    </div>
</body>
</html>
