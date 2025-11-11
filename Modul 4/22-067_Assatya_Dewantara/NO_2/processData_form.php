<!-- <!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background-color: white;
            border: 2px solid #555;
            padding: 20px;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        fieldset {
            border: 1px solid #888;
            padding: 15px;
        }
        legend {
            font-weight: bold;
        }
        table {
            width: 100%;
        }
        td {
            padding: 5px;
            vertical-align: top;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: 95%;
            padding: 5px;
        }
        input[type="submit"],
        input[type="reset"] {
            padding: 6px 12px;
            margin-top: 10px;
            cursor: pointer;
        }
        .button-row {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <?php
        //$errors = [];
        //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //    require 'validate.inc';
        //    validateName($errors, $_POST, 'surname');
        //    if ($errors) {
        //        echo '<h3 class="error">Invalid! Correct the following errors:</h3>';
        //        foreach ($errors as $field => $error) {
        //            echo "<p class='error'>$field $error</p>";
        //        }
                // tampilkan kembali form kosong
        //        include 'form.inc';
        //    } else {
        //        echo '<p class="success">Form submitted successfully with no errors.</p>';
        //    }
        //} else {
        // pertama kali buka halaman → tampilkan form kosong
        //    include 'form.inc';
        //}
        // tampilkan form (diambil dari file terpisah)
        //require 'form.inc';
        ?>
    </div>
</body>
</html>
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .container {
            width: 480px;
            margin: 50px auto;
            background-color: white;
            border: 2px solid #555;
            padding: 20px;
            border-radius: 8px;
        }
        h2, h3 {
            text-align: center;
        }
        .error { color: red; text-align: center; font-weight: bold; }
        .success { color: green; text-align: center; font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h2>Register</h2>

    <?php
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'validate.inc';

        // Panggil semua validasi
        validateName($errors, $_POST, 'surname');
        validateEmail($errors, $_POST, 'email');
        validatePassword($errors, $_POST, 'password');
        validateAddress($errors, $_POST, 'address');
        validateState($errors, $_POST, 'state');
        validateGender($errors, $_POST, 'gender');

        if ($errors) {
            echo '<h3 class="error">Please correct the following errors:</h3>';
            include 'form.inc'; // tampilkan kembali form + data sebelumnya
        } else {
            echo '<p class="success">Form submitted successfully with no errors!</p>';
        }
    } else {
        include 'form.inc'; // tampilkan form pertama kali
    }
    ?>
</div>
</body>
</html>
