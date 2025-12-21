<!-- soal 2.4, 2.7 dan  2.9 -->
 <form name="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  <div class="field">
      <label for="surname">Fullname:</label>
      <input type="text" name="surname" size="31"
             value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>" />
  </div>
  <?php if(isset($errors['surname'])) echo "<p style='color:red;margin-left:150px;'>{$errors['surname']}</p>"; ?>

  <div class="field">
      <label for="email">Email address:</label>
      <input type="email" name="email" size="31"
             value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
  </div>
  <?php if(isset($errors['email'])) echo "<p style='color:red;margin-left:150px;'>{$errors['email']}</p>"; ?>

  <div class="field">
      <label for="password">Password:</label>
      <input type="password" name="password" size="31" />
  </div>
  <?php if(isset($errors['password'])) echo "<p style='color:red;margin-left:150px;'>{$errors['password']}</p>"; ?>

  <div class="field">
      <label for="address">Street Address:</label>
      <textarea name="address" rows="3" cols="22"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
  </div>
  <?php if(isset($errors['address'])) echo "<p style='color:red;margin-left:150px;'>{$errors['address']}</p>"; ?>

  <div class="field">
      <label for="state">State:</label>
      <select name="state">
          <option value="-1">[Choose your state]</option>
          <option value="1" <?php if(isset($_POST['state']) && $_POST['state']=="1") echo "selected"; ?>>Australian Capital Territory</option>
          <option value="2" <?php if(isset($_POST['state']) && $_POST['state']=="2") echo "selected"; ?>>Queensland</option>
          <option value="3" <?php if(isset($_POST['state']) && $_POST['state']=="3") echo "selected"; ?>>Victoria</option>
          <option value="4" <?php if(isset($_POST['state']) && $_POST['state']=="4") echo "selected"; ?>>New South Wales</option>
          <option value="5" <?php if(isset($_POST['state']) && $_POST['state']=="5") echo "selected"; ?>>Tasmania</option>
          <option value="6" <?php if(isset($_POST['state']) && $_POST['state']=="6") echo "selected"; ?>>South Australia</option>
          <option value="7" <?php if(isset($_POST['state']) && $_POST['state']=="7") echo "selected"; ?>>Western Australia</option>
          <option value="8" <?php if(isset($_POST['state']) && $_POST['state']=="8") echo "selected"; ?>>Northern Territory</option>
      </select>
  </div>
  <?php if(isset($errors['state'])) echo "<p style='color:red;margin-left:150px;'>{$errors['state']}</p>"; ?>

  <div class="field">
      <label for="sex">Gender:</label>
      <input type="radio" name="sex" value="Male" <?php if(isset($_POST['sex']) && $_POST['sex']=="Male") echo "checked"; ?> />Male
      <input type="radio" name="sex" value="Female" <?php if(isset($_POST['sex']) && $_POST['sex']=="Female") echo "checked"; ?> />Female
  </div>
  <?php if(isset($errors['sex'])) echo "<p style='color:red;margin-left:150px;'>{$errors['sex']}</p>"; ?>

  <div class="field">
      <label for="vegetarian">Vegetarian?</label>
      <input type="checkbox" name="vegetarian" <?php if(isset($_POST['vegetarian'])) echo "checked"; ?> />
  </div>

  <div class="field">
      <label></label>
      <input type="submit" value="Submit" name="Submit" />
      <input type="reset" value="Reset" name="Reset" />
  </div> 
</form>
