<fieldset>
    <legend>Person Details</legend>
    <form name="myForm" action="form.php" method="POST">
        <!-- Surname -->
        <div class="field">
            <label for="surname">Surname</label>
            <input type="text" name="surname" size="31" 
                value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>"/>
            <?php if (isset($errors['surname'])): ?>
                <div class="error">Surname <?php echo $errors['surname']; ?></div>
            <?php endif; ?>
        </div>
        
        <!-- Email -->
        <div class="field">
            <label for="email">Email address</label>
            <input type="text" name="email" size="31"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"/>
            <?php if (isset($errors['email'])): ?>
                <div class="error">Email <?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>
        
        <!-- Password -->
        <div class="field">
            <label for="passwd">Password</label>
            <input type="password" name="passwd" size="31"
                   value="<?php echo isset($_POST['passwd']) ? htmlspecialchars($_POST['passwd']) : ''; ?>"/>
            <?php if (isset($errors['passwd'])): ?>
                <div class="error">Password <?php echo $errors['passwd']; ?></div>
            <?php endif; ?>
        </div>
        
        <!-- Address -->
        <div class="field">
            <label for="address">Street Address</label>
            <textarea name="address" rows="2" cols="22"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
            <?php if (isset($errors['address'])): ?>
                <div class="error">Address <?php echo $errors['address']; ?></div>
            <?php endif; ?>
        </div>
        
        <!-- State -->
        <div class="field">
            <label for="state">State</label>
            <select name="state">
                <option value="">Choose your state</option>
                <option value="1" <?php echo (isset($_POST['state']) && $_POST['state'] == '1') ? 'selected' : ''; ?>>Australian Capital Territory</option>
                <option value="2" <?php echo (isset($_POST['state']) && $_POST['state'] == '2') ? 'selected' : ''; ?>>Queensland</option>
                <option value="3" <?php echo (isset($_POST['state']) && $_POST['state'] == '3') ? 'selected' : ''; ?>>Victoria</option>
                <option value="4" <?php echo (isset($_POST['state']) && $_POST['state'] == '4') ? 'selected' : ''; ?>>New South Wales</option>
                <option value="5" <?php echo (isset($_POST['state']) && $_POST['state'] == '5') ? 'selected' : ''; ?>>Tasmania</option>
                <option value="6" <?php echo (isset($_POST['state']) && $_POST['state'] == '6') ? 'selected' : ''; ?>>Western Australia</option>
                <option value="7" <?php echo (isset($_POST['state']) && $_POST['state'] == '7') ? 'selected' : ''; ?>>South Australia</option>
                <option value="8" <?php echo (isset($_POST['state']) && $_POST['state'] == '8') ? 'selected' : ''; ?>>Northern Territory</option>
            </select>
            <?php if (isset($errors['state'])): ?>
                <div class="error">State <?php echo $errors['state']; ?></div>
            <?php endif; ?>
        </div>
        
        <!-- Country (hidden) -->
        <div class="field">
            <input type="hidden" name="country" value="Australia">
        </div>
        
        <!-- Gender -->
        <div class="field">
            <label for="sex">Gender</label>
            <input type="radio" name="sex" value="male" 
                   <?php echo (isset($_POST['sex']) && $_POST['sex'] == 'male') ? 'checked' : ''; ?>/>Male
            <input type="radio" name="sex" value="female"
                   <?php echo (isset($_POST['sex']) && $_POST['sex'] == 'female') ? 'checked' : ''; ?>/>Female
            <?php if (isset($errors['sex'])): ?>
                <div class="error">Gender <?php echo $errors['sex']; ?></div>
            <?php endif; ?>
        </div>
        
        <!-- Vegetarian -->
        <div class="field">
            <label for="vegetarian">Vegetarian?</label>
            <input type="checkbox" name="vegetarian" 
                   <?php echo isset($_POST['vegetarian']) ? 'checked' : ''; ?>/>
        </div>
        
        <div class="buttons">
            <input type="submit" value="Submit" name="submit" />
            <input type="reset" value="Reset" name="reset" />
        </div>
    </form>
</fieldset>