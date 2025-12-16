<form action="register.php" method="post">
    <fieldset>
        <legend>Person Details</legend>

        <!-- Surname -->
        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname"
                   value="<?php if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>"
                   required size="31">
        </div>

        <!-- Email -->
        <div class="field">
            <label for="email">Email address</label>
            <input type="text" name="email"
                   value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"
                   required size="31">
        </div>

        <!-- Password -->
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password"
                   value="<?php if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>"
                   required size="31">
        </div>

        <!-- Age -->
        <div class="field">
            <label for="age">Age</label>
            <input type="text" id="age" name="age"
                   value="<?php if (isset($_POST['age'])) echo htmlspecialchars($_POST['age']); ?>"
                   required size="10">
        </div>

        <!-- Date of Birth -->
        <div class="field">
            <label for="dob">Date of Birth (yyyy-mm-dd)</label>
            <input type="text" id="dob" name="dob"
                   value="<?php if (isset($_POST['dob'])) echo htmlspecialchars($_POST['dob']); ?>"
                   required size="15">
        </div>

        <!-- Address -->
        <div class="field">
            <label for="address">Street Address</label>
            <textarea name="address" rows="3" cols="22"><?php
                if (isset($_POST['address'])) echo htmlspecialchars($_POST['address']);
            ?></textarea>
        </div>

        <!-- State -->
        <div class="field">
            <label for="state">State</label>
            <select name="state">
                <option value="-1">[choose your state]</option>
                <option value="1" <?php if(isset($_POST['state']) && $_POST['state'] == '1') echo 'selected'; ?>>Australian Capital Territory</option>
                <option value="2" <?php if(isset($_POST['state']) && $_POST['state'] == '2') echo 'selected'; ?>>Queensland</option>
                <option value="3" <?php if(isset($_POST['state']) && $_POST['state'] == '3') echo 'selected'; ?>>Victoria</option>
                <option value="4" <?php if(isset($_POST['state']) && $_POST['state'] == '4') echo 'selected'; ?>>New South Wales</option>
                <option value="5" <?php if(isset($_POST['state']) && $_POST['state'] == '5') echo 'selected'; ?>>Tasmania</option>
                <option value="6" <?php if(isset($_POST['state']) && $_POST['state'] == '6') echo 'selected'; ?>>South Australia</option>
                <option value="7" <?php if(isset($_POST['state']) && $_POST['state'] == '7') echo 'selected'; ?>>Western Australia</option>
                <option value="8" <?php if(isset($_POST['state']) && $_POST['state'] == '8') echo 'selected'; ?>>Northern Territory</option>
            </select>
        </div>

        <!-- Gender -->
        <div class="field">
            <label for="sex">Gender</label>
            <input type="radio" name="sex" value="male"
                <?php if(isset($_POST['sex']) && $_POST['sex'] == 'male') echo 'checked'; ?>> Male
            <input type="radio" name="sex" value="female"
                <?php if(isset($_POST['sex']) && $_POST['sex'] == 'female') echo 'checked'; ?>> Female
        </div>

        <!-- Vegetarian -->
        <div class="field">
            <label for="vegetarian">Vegetarian?</label>
            <input type="checkbox" name="vegetarian" value="yes"
                <?php if(isset($_POST['vegetarian']) && $_POST['vegetarian'] == 'yes') echo 'checked'; ?>>
        </div>

        <!-- Buttons -->
        <div class="field">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
    </fieldset>
</form>