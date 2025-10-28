    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulir Data Pribadi (Server-side Validation)</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 30px; }
            .error { color: red; }
            input, textarea, select { margin-bottom: 10px; width: 250px; }
            label { font-weight: bold; }
        </style>
    </head>
    <body>
    <h2>Formulir Data Pribadi</h2>

    <?php
    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require 'validate.inc';
    
        validateName($errors, $_POST, 'surname');
        validateEmail($errors, $_POST, 'email');
        validatePassword($errors, $_POST, 'password');
        validateAddress($errors, $_POST, 'address');
        validateState($errors, $_POST, 'state');
        validateGender($errors, $_POST, 'gender');
        validateVegetarian($errors, $_POST, 'vegetarian');

        if ($errors) {
            echo '<h3 class="error">Invalid, correct the following errors:</h3>';
            foreach ($errors as $field => $error) {
                echo "<p class='error'><b>$field</b>: $error</p>";
            }
        } else {
            echo '<h3 style="color:green;">Form submitted successfully with no errors!</h3>';
        }
    }
    ?>

    <form action="processData_form.php" method="POST">
        <label for="surname">Surname:</label><br>
        <input type="text" id="surname" name="surname"
            value="<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>"><br>

        <label for="email">Email Address:</label><br>
        <input type="text" id="email" name="email"
            value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="address">Street Address:</label><br>
        <textarea id="address" name="address" rows="3" cols="30"><?php
            if(isset($_POST['address'])) echo $_POST['address'];
        ?></textarea><br>

        <label for="state">State:</label><br>
        <select id="state" name="state">
            <option value="">-- Select State --</option>
            <?php
            $states = ["Indonesia", "Queensland", "Victoria", "Western Australia"];
            foreach ($states as $s) {
                $selected = (isset($_POST['state']) && $_POST['state'] == $s) ? "selected" : "";
                echo "<option value='$s' $selected>$s</option>";
            }
            ?>
        </select><br>

        <input type="hidden" name="country" value="Australia">

        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") echo "checked"; ?>> Male<br>
        <input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") echo "checked"; ?>> Female<br>

        <label>Vegetarian?</label><br>
        <input type="checkbox" name="vegetarian" value="Yes" <?php if(isset($_POST['vegetarian'])) echo "checked"; ?>> Yes<br>

        <br><input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
    </body>
    </html>
