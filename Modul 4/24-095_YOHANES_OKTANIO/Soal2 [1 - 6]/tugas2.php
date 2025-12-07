<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .field {
            display: flex;
            justify-content: space-between;
            width: 350px;
            padding: 5px 0;
        }

        .field label {
            min-width: 120px;
        }

        .space {
            flex: 1;
        }

        .error {
            color: red;
            font-size: 10pt;
        }

        textarea {
            width: 238px;
        }
    </style>
</head>

<body>
    <h1>Register</h1>
    <div id="errorBox" style="color:red; font-weight:bold; margin-bottom:10px;"></div>
    <?php
    require('validate.inc'); // tugas 5
    $errors = array();
    if (isset($_POST['surname'])) {
        validateName($errors, $_POST, 'surname');
        if ($errors) {
            echo '<h1>Invalid, correct the following
errors:</h1>';
            foreach ($errors as $field => $error)
                echo "$field $error</br>";
            require('form.inc');
        } else {
            echo 'Form submitted successfully with no errors';
        }
    } else
        require('form.inc');
    ?>
</body>

</html>