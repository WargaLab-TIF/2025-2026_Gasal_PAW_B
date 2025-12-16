<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form </title>
</head>
<body>
    <h2>Register</h2>

    <?php
    $errors = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'validate.inc';
        validateName($errors, $_POST, 'surname');
        validateEmail($errors, $_POST, 'email');
        validatePassword($errors, $_POST, 'password');
        validateAddress($errors, $_POST, 'address');
        validateState($errors, $_POST, 'state');
        validateGender($errors, $_POST, 'sex');

        if ($errors) {
            echo "<h3>Invalid — please correct the following errors:</h3>";
            echo "<ul>";
            foreach ($errors as $field => $error) {
                echo "<li><b>$field:</b> $error</li>";
            }
            echo "</ul>";

            include 'form.inc';
        } else {
            echo "<h3>Form submitted successfully with no errors!</h3>";
            echo "<h4>Submitted Data:</h4>";
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
        }
    } else {
        include 'form.inc';
    }
    ?>
</body>
</html>
