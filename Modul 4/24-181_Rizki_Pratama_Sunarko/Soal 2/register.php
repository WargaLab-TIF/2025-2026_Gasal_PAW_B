<?php
$errors = array();
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');

    // Jika tidak ada error, tandai sukses
    if (empty($errors)) {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form (Self-Submission)</title>
    <link rel="stylesheet" href="../Soal 1/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error {
            color: red;
            margin: 10px 0;
        }
        .success {
            color: green;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Register</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($success) {
            echo '<div class="success">';
            echo '<h3>Form submitted successfully with no errors!</h3>';
            echo '</div>';
        } else {
            echo '<div class="error">';
            echo '<h3>Invalid input. Please correct the following errors:</h3>';
            foreach ($errors as $field => $error) {
                echo "$field is $error<br>";
            }
            echo '</div>';

            include 'form.inc';
        }
    } else {
        include 'form.inc';
    }
    ?>
</div>
</body>
</html>
