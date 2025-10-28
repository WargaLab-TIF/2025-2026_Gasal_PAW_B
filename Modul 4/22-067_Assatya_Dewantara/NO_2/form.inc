<!-- <form action="processData.php" method="POST"> -->
<!-- <form action="processData_form.php" method="POST">
    <fieldset>
        <legend>Person Details</legend>
        <table>
            <tr>
                <td>Surname</td>
                <td><input type="text" name="surname" required></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Street Address</td>
                <td><textarea name="address" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <select name="state">
                        <option value="New South Wales">New South Wales</option>
                        <option value="Victoria">Victoria</option>
                        <option value="Queensland">Queensland</option>
                        <option value="Tasmania">Tasmania</option>
                        <option value="Western Australia">Western Australia</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Swiss">Swiss</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="hidden" name="country" value="Australia">Australia</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="Male" checked> Male
                    <input type="radio" name="gender" value="Female"> Female
                </td>
            </tr>
            <tr>
                <td>Vegetarian?</td>
                <td><input type="checkbox" name="vegetarian" value="Yes"> Yes</td>
            </tr>
            <tr>
                <td colspan="2" class="button-row">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </fieldset>
</form> -->

<!-- diperbarui -->
<!-- <form action="processData_form.php" method="POST">
    <fieldset>
        <legend>Person Details</legend>
        <table>
            <tr>
                <td>Surname</td>
                <td>
                    <input type="text" name="surname" 
                        value="<?php //echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>" 
                        required>
                </td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td>
                    <input type="email" name="email" 
                        value="<?php //echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                        required>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" 
                        value="<?php //echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" 
                        required>
                </td>
            </tr>
            <tr>
                <td>Street Address</td>
                <td>
                    <textarea name="address" rows="3"><?php 
                        //echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; 
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <select name="state">
                        <?php 
                        //$states = ["New South Wales","Victoria","Queensland","Tasmania","Western Australia","Indonesia","Mongolia","Swiss"];
                        //$selected = $_POST['state'] ?? '';
                        //foreach ($states as $state) {
                        //    $sel = ($state == $selected) ? 'selected' : '';
                        //    echo "<option value='$state' $sel>$state</option>";
                        //}
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="hidden" name="country" value="Australia">Australia</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <?php //$gender = $_POST['gender'] ?? 'Male'; ?>
                    <input type="radio" name="gender" value="Male" <?php //if ($gender=='Male') echo 'checked'; ?>> Male
                    <input type="radio" name="gender" value="Female" <?php //if ($gender=='Female') echo 'checked'; ?>> Female
                </td>
            </tr>
            <tr>
                <td>Vegetarian?</td>
                <td>
                    <input type="checkbox" name="vegetarian" value="Yes" 
                        <?php //if (isset($_POST['vegetarian'])) echo 'checked'; ?>> Yes
                </td>
            </tr>
            <tr>
                <td colspan="2" class="button-row">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </fieldset>
</form> -->

<!-- diperbarui 2 -->
<form action="processData_form.php" method="POST">
    <fieldset>
        <legend>Person Details</legend>
        <table>
            <tr>
                <td>Surname</td>
                <td>
                    <input type="text" name="surname" 
                        value="<?php echo htmlspecialchars($_POST['surname'] ?? ''); ?>" required>
                    <div style="color:red;">
                        <?php echo $errors['surname'] ?? ''; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td>
                    <input type="email" name="email" 
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                    <div style="color:red;">
                        <?php echo $errors['email'] ?? ''; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" 
                        value="<?php echo htmlspecialchars($_POST['password'] ?? ''); ?>" required>
                    <div style="color:red;">
                        <?php echo $errors['password'] ?? ''; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Street Address</td>
                <td>
                    <textarea name="address" rows="3"><?php echo htmlspecialchars($_POST['address'] ?? ''); ?></textarea>
                    <div style="color:red;">
                        <?php echo $errors['address'] ?? ''; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>State</td>
                <td>
                    <select name="state">
                        <?php 
                        $states = ["New South Wales","Victoria","Queensland","Tasmania","Western Australia","Indonesia","Mongolia","Swiss"];
                        $selected = $_POST['state'] ?? '';
                        foreach ($states as $state) {
                            $sel = ($state == $selected) ? 'selected' : '';
                            echo "<option value='$state' $sel>$state</option>";
                        }
                        ?>
                    </select>
                    <div style="color:red;">
                        <?php echo $errors['state'] ?? ''; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="hidden" name="country" value="Australia">Australia</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <?php $gender = $_POST['gender'] ?? ''; ?>
                    <input type="radio" name="gender" value="Male" <?php if ($gender=='Male') echo 'checked'; ?>> Male
                    <input type="radio" name="gender" value="Female" <?php if ($gender=='Female') echo 'checked'; ?>> Female
                    <div style="color:red;">
                        <?php echo $errors['gender'] ?? ''; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Vegetarian?</td>
                <td>
                    <input type="checkbox" name="vegetarian" value="Yes" 
                        <?php if (isset($_POST['vegetarian'])) echo 'checked'; ?>> Yes
                </td>
            </tr>
            <tr>
                <td colspan="2" class="button-row">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </fieldset>
</form>
