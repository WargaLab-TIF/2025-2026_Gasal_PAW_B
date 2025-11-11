<!-- validatename array -->
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Data Pribadi</title>
</head>
<body>
    <h2>Data yang Anda Kirimkan:</h2>

    <?php
    require 'validate.inc';
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        validateName($errors, $_POST, 'surname');
        if ($errors) {
            echo "<p><strong>Errors:</strong><br/>";
            foreach ($errors as $field => $error)
                echo "$field $error<br/>";
            echo "</p>";
        } else {
            echo "<p><strong>Data OK!</strong></p>";
        }
    }
    ?>
</body>
</html>
