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
    $errors = array();
    validateName($errors, $_GET, 'surname');

    if ($errors) { 
        echo "Errors:<br/>";
        foreach ($errors as $field => $error)
            echo "$field $error<br/>";
    } else {
        echo "Data OK!";
    }
    ?>
</body>
</html>

<!-- validatename -->
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Hasil Data Pribadi</title>
</head>
<body>
    <h2>Data yang Anda Kirimkan:</h2>
 -->
    <?php
    // require 'validate.inc'; 

    // if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //     if (validateName($_GET, 'surname')) {
    //         echo "Data OK!";
    //     } else {
    //         echo "Data invalid!";
    //     }
    // } else {
    //     echo "Silakan isi form terlebih dahulu.";
    // }
     ?>
<!-- </body>
</html>
 -->