<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <label>Surname:</label><br>
  <input type="text" name="surname" value="<?php echo htmlspecialchars($_POST['surname'] ?? '') ?>">
  <?php if (!empty($errors['surname'])) echo "<span style='color:red'> ({$errors['surname']})</span>"; ?>
  <br><br>

  <label>Email Address:</label><br>
  <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
  <?php if (!empty($errors['email'])) echo "<span style='color:red'> ({$errors['email']})</span>"; ?>
  <br><br>

  <label>Password:</label><br>
  <input type="password" name="password">
  <?php if (!empty($errors['password'])) echo "<span style='color:red'> ({$errors['password']})</span>"; ?>
  <br><br>

  <label>Street Address:</label><br>
  <textarea name="address" rows="3" cols="30"><?php echo htmlspecialchars($_POST['address'] ?? '') ?></textarea>
  <?php if (!empty($errors['address'])) echo "<span style='color:red'> ({$errors['address']})</span>"; ?>
  <br><br>

  <label>State:</label><br>
  <select name="state">
    <?php
    $states = ['Jakarta', 'Jawa Barat', 'Jawa Timur', 'Bali'];
    foreach ($states as $state) {
      $selected = ($_POST['state'] ?? '') === $state ? 'selected' : '';
      echo "<option value=\"$state\" $selected>$state</option>";
    }
    ?>
  </select>
  <?php if (!empty($errors['state'])) echo "<span style='color:red'> ({$errors['state']})</span>"; ?>
  <br><br>

  <input type="hidden" name="country" value="Australia">

  <label>Gender:</label><br>
  <input type="radio" name="gender" value="Male" <?php if (($_POST['gender'] ?? '') === 'Male') echo 'checked'; ?>> Male
  <input type="radio" name="gender" value="Female" <?php if (($_POST['gender'] ?? '') === 'Female') echo 'checked'; ?>> Female
  <?php if (!empty($errors['gender'])) echo "<span style='color:red'> ({$errors['gender']})</span>"; ?>
  <br><br>

  <label>Vegetarian?</label>
  <input type="checkbox" name="vegetarian" value="Yes" <?php if (!empty($_POST['vegetarian'])) echo 'checked'; ?>>
  <br><br>

  <input type="submit" value="Submit">
  <input type="reset" value="Reset">
</form>