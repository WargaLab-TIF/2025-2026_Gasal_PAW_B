<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation Example</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background-color: #eef1f5;
            color: #333;
            margin: 0;
            padding: 40px;
        }

        form {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #d0d7de;
            padding: 25px 30px;
            max-width: 500px;
            margin: 30px auto;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
        }

        legend {
            font-size: 1.3em;
            font-weight: 600;
            color: #1a4f8b;
            margin-bottom: 15px;
            border-bottom: 2px solid #1a4f8b;
            display: inline-block;
            padding-bottom: 5px;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 0.95em;
            margin-bottom: 6px;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #c5c9cf;
            border-radius: 6px;
            font-size: 0.95em;
            transition: border-color 0.2s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        textarea:focus,
        select:focus {
            border-color: #1a4f8b;
            outline: none;
            box-shadow: 0 0 4px rgba(26, 79, 139, 0.2);
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 6px;
            transform: scale(1.1);
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #1a4f8b;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.95em;
            transition: background-color 0.25s ease;
        }

        input[type="submit"]:hover {
            background-color: #154070;
        }

        input[type="reset"] {
            background-color: #9ca3af;
        }

        input[type="reset"]:hover {
            background-color: #6b7280;
        }

        textarea {
            resize: vertical;
            min-height: 60px;
        }

        .error {
            color: #d60000;
            font-size: 0.85em;
            margin-top: 4px;
        }

        h1 {
            color: #d60000;
            font-size: 1.2em;
            text-align: center;
            max-width: 500px;
            margin: 20px auto;
        }

        h1.success {
            color: #008000;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            form {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <?php
    $errors = array();
    
    // Cek apakah form sudah disubmit dengan mengecek method POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'validate.inc';
        
        // Validasi semua field
        validateName($errors, $_POST, 'surname');
        validateEmail($errors, $_POST, 'email');
        validatePassword($errors, $_POST, 'passwd');
        validateAddress($errors, $_POST, 'address');
        validateState($errors, $_POST, 'state');
        validateGender($errors, $_POST, 'sex');
        
        if (!empty($errors)) {
            // Hanya tampilkan header error, tanpa detail
            echo '<h1>Invalid, correct the following errors:</h1>';
            // tampilkan kembali form (error akan muncul di samping masing-masing field)
            include 'form.inc';
        } else {
            echo '<h1 class="success">Form submitted successfully with no errors</h1>';
            echo '<div style="max-width: 500px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px;">';
            echo '<h2>Submitted Data:</h2>';
            echo '<p><strong>Surname:</strong> ' . htmlspecialchars($_POST['surname']) . '</p>';
            echo '<p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>';
            echo '<p><strong>Address:</strong> ' . htmlspecialchars($_POST['address']) . '</p>';
            echo '<p><strong>State:</strong> ' . htmlspecialchars($_POST['state']) . '</p>';
            echo '<p><strong>Gender:</strong> ' . htmlspecialchars($_POST['sex']) . '</p>';
            echo '<p><strong>Country:</strong> ' . htmlspecialchars($_POST['country']) . '</p>';
            echo '<p><strong>Vegetarian:</strong> ' . (isset($_POST['vegetarian']) ? 'Yes' : 'No') . '</p>';
            echo '</div>';
        }
    } else {
        // tampilkan form untuk pertama kali
        include 'form.inc';
    }
    ?>
</body>
</html>