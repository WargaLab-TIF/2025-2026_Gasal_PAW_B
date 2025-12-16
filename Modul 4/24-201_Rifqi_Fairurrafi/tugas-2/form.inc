<form name="my-form" action="processData_form.php" method="post">
    <fieldset>
        <legend>Person Details</legend>
        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" size="31" value="<?= isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '' ?>">
        </div>
        <div class="field">
            <label for="email">Email</label>
            <input type="email" name="email" size="13" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password" size="13" value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>">
        </div>
        <div class="field">
            <label for="address">Street Address</label>
            <textarea name="address" cols="22" rows="3"><?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?></textarea>
        </div>
        <div class="field">
            <label for="state">State</label>
            <select name="state">
                <?php
                $states = [
                    "-1" => "[Choose your state]",
                    "1" => "Australian Capital Territory",
                    "2" => "Queersland",
                    "3" => "Victoria",
                    "4" => "New South Wales",
                    "5" => "Tasmania",
                    "6" => "South Australia",
                    "7" => "Western Australia",
                    "8" => "Nothern Territory"
                ];
                $selected = $_POST['state'] ?? "-1";
                foreach ($states as $key => $value) {
                    $isSelected = ($selected == $key) ? 'selected' : '';
                    echo "<option value='$key' $isSelected>$value</option>";
                }
                ?>
            </select>
        </div>
        <div class="field">
            <input type="hidden" name="country" value="Australia">
        </div>
        <div class="field">
            <label for="sex">Gender</label>
            <input type="radio" name="sex" value="male" <?= (isset($_POST['sex']) && $_POST['sex'] == 'male') ? 'checked' : '' ?>>Male
            <input type="radio" name="sex" value="female" <?= (isset($_POST['sex']) && $_POST['sex'] == 'female') ? 'checked' : '' ?>>Female
        </div>
        <div class="field">
            <label for="vegetarian" <?= isset($_POST['vegetarian']) ? 'checked' : '' ?>>Vegetarian?</label>
            <input type="checkbox" name="vegetarian">
        </div>
        <div class="field">
            <label>&nbsp;</label>
            <input type="submit" value="Submit" name="submit">
            <input type="reset" value="Reset" name="reset">
        </div>
    </fieldset>
</form>