<form action="processData_form.php" method="POST">
    
    <div>
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" 
            value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
    </div>

    <div>
        <label for="email">Email address:</label>
        <input type="email" id="email" name="email"
            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
    </div>
  
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"
            value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
    </div>

    <div>
        <label for="address">Street Address:</label>
        <textarea id="address" name="address" rows="3"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
    </div>

    <div>
        <label for="state">State:</label>
        <select id="state" name="state">
            <option value="">-- Pilih State --</option>
            <option value="id" <?php echo (isset($_POST['state']) && $_POST['state'] == 'id') ? 'selected' : ''; ?>>Indonesia</option>
            <option value="jp" <?php echo (isset($_POST['state']) && $_POST['state'] == 'jp') ? 'selected' : ''; ?>>Jepang</option>
            <option value="ar" <?php echo (isset($_POST['state']) && $_POST['state'] == 'ar') ? 'selected' : ''; ?>>Arab Saudi</option>
            <option value="am" <?php echo (isset($_POST['state']) && $_POST['state'] == 'am') ? 'selected' : ''; ?>>Amerika</option>
        </select>
    </div>

    <input type="hidden" name="country" value="Indonesia">

    <div class="radio-group">
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'checked' : ''; ?>>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'checked' : ''; ?>>
        <label for="female">Female</label>
    </div>

    <div class="checkbox-group">
        <input type="checkbox" id="vegetarian" name="vegetarian" value="Yes" <?php echo isset($_POST['vegetarian']) ? 'checked' : ''; ?>>
        <label for="vegetarian">Vegetarian?</label>
    </div>

    <hr>
    <div>
        <label for="age">Age: (Type Testing )</label>
        <input type="text" id="age" name="age"
            value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>">
    </div>
    
    <div>
        <label for="website">Website: (Filter, Opsional)</label>
        <input type="text" id="website" name="website"
            value="<?php echo isset($_POST['website']) ? htmlspecialchars($_POST['website']) : ''; ?>">
    </div>

    <div>
        <label for="dob">Date of Birth (YYYY-MM-DD): (Date )</label>
        <input type="text" id="dob" name="dob"
            value="<?php echo isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : ''; ?>">
    </div>

    <div class="buttons">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </div>
</form>