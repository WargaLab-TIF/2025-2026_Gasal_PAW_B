<form method="post" action="processData_form.php">
    <label>Surname:</label><br>
    <input type="text" name="surname"
       value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>"><br><br>

    <label>Email Address:</label><br>
    <input type="text" name="email"
           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password"
           value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>"><br><br>

    <label>Street Address:</label><br>
    <textarea name="address" rows="3" cols="30"><?php
        echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    ?></textarea><br><br>

    <label>State:</label><br>
    <select name="state">
        <?php
        $states = [
            "NSW" => "New South Wales",
            "VIC" => "Victoria",
            "QLD" => "Queensland",
            "WA"  => "Western Australia",
            "SA"  => "South Australia"
        ];
        $selected = isset($_POST['state']) ? $_POST['state'] : '';
        foreach ($states as $abbr => $label) {
            $sel = ($selected == $abbr) ? 'selected' : '';
            echo "<option value='$abbr' $sel>$label</option>";
        }
        ?>
    </select><br><br>

    <input type="hidden" name="country" value="Australia">

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male"
        <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female"
        <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female") echo "checked"; ?>> Female<br><br>

    <label>Vegetarian?</label>
    <input type="checkbox" name="vegetarian" value="Yes"
        <?php if (isset($_POST['vegetarian'])) echo "checked"; ?>><br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>
