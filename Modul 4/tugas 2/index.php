<?php
$errors = array();

if (isset($_POST['submit'])) {
    
    require 'validate.php'; 
    
    validateName($errors, $_POST, 'fname');
    
    validateName($errors, $_POST, 'surname');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 4 - Self-Submission</title>

</head>
<body>
    <p>Praktikum 2</p>

    <?php
    if (isset($_POST['submit']) && !$errors) {
        
        echo '<h1>Form submitted successfully with no errors</h1>';
        
        $fname = htmlspecialchars($_POST['fname']);
        $surname = htmlspecialchars($_POST['surname']);
        echo "<p>Firstname: $fname</p>";
        echo "<p>Surname: $surname</p>";
    
    } else {
        
        if ($errors) {
            echo '<h1>Invalid, correct the following errors:</h1>';
        } else {
            echo "<h1>Isi Formulir</h1>";
        }
        
        include 'form.inc';
    }
    ?>

</body>
</html>