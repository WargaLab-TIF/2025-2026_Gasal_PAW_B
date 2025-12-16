<legend>Person Details</legend>
<div class="field">
    <label for="surname">Surname</label>
    <input type="text" name="surname" size="11" 
           value="<?php if(isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>"/>
</div>
<div class="field">
    <label for="email">Email address</label>
    <input type="text" name="email" size="11"
           value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"/>
</div>
<div class="field">
    <label for="passwd">Password</label>
    <input type="password" name="passwd" size="11"/>
</div>
<div class="field">
    <label for="address">Street Address</label>
    <textarea name="address" cols="20" rows="2"><?php if(isset($_POST['address'])) echo htmlspecialchars($_POST['address']); ?></textarea>
</div>
<div class="field">
    <label for="state">State</label>
    <select name="state">
        <option value="-1">[choose your state]</option>
        
        <option value="1" <?php if(isset($_POST['state']) && $_POST['state'] == '1') echo 'selected'; ?>>
            Australian Capital Territory
        </option>
        <option value="2" <?php if(isset($_POST['state']) && $_POST['state'] == '2') echo 'selected'; ?>>
            Queensland
        </option>
        </select>
</div>
<div class="field">
    <input type="hidden" name="country" value="Australia">
</div>
<div class="field">
    <label for="sex">Gender</label>
    <input type="radio" name="sex" value="male" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'male') echo 'checked'; ?>/>Male
    <input type="radio" name="sex" value="female" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'female') echo 'checked'; ?>/>Female
</div>
<div class="field">
    <label for="vegetarian">Vegetarian?</label>
    <input type="checkbox" name="vegetarian" <?php if(isset($_POST['vegetarian'])) echo 'checked'; ?>/>
</div>
<div class="field">
    <label>&nbsp;</label>
    <input type="submit" value="Submit" name="submit" />
    <input type="reset" value="Reset" name="reset" />
</div>