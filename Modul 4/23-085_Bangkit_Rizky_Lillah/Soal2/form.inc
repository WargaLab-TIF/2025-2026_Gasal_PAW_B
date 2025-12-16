<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi Self-Submission</title>
</head>
<body>
    <h2>Form Data Pribadi</h2>

    <?php
    // tampilkan pesan error jika ada
    if (!empty($errors)) {
        echo "<div style='color:red;'><b>Terjadi Kesalahan:</b><br/>";
        foreach ($errors as $field => $error) {
            echo ucfirst($field) . " : " . htmlspecialchars($error) . "<br/>";
        }
        echo "</div><br/>";
    }
    ?>

    <form method="POST" action="">
        <label>Surname:</label><br>
        <input type="text" name="surname" 
            value="<?php if(isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>"><br><br>

        <label>Email Address:</label><br>
        <input type="email" name="email"
            value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <label>Street Address:</label><br>
        <textarea name="address" rows="3" cols="30"><?php 
            if(isset($_POST['address'])) echo htmlspecialchars($_POST['address']); 
        ?></textarea><br><br>

        <label>State:</label><br>
        <select name="state">
            <?php
            $states = ["BKL"=>"Bangkalan", "SPG"=>"Sampang", "PMK"=>"Pamekasan", "SBY"=>"Surabaya"];
            foreach ($states as $code => $name) {
                $selected = (isset($_POST['state']) && $_POST['state'] == $code) ? 'selected' : '';
                echo "<option value='$code' $selected>$name</option>";
            }
            ?>
        </select><br><br>

        <input type="hidden" name="country" value="Indonesia">

        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male" 
            <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") echo "checked"; ?>> Male
        <input type="radio" name="gender" value="Female" 
            <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") echo "checked"; ?>> Female<br><br>

        <label>Vegetarian?</label>
        <input type="checkbox" name="vegetarian" value="Yes"
            <?php if(isset($_POST['vegetarian'])) echo "checked"; ?>><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
