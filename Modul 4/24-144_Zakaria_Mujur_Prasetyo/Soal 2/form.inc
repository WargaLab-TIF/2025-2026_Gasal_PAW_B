<form name="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  <label>Surname:</label>
  <input type="text" name="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>" />
  <?php if (!empty($errors['surname'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['surname']); ?>)</small><?php endif; ?>
  <br />

  <label>Email address:</label>
  <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
  <?php if (!empty($errors['email'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['email']); ?>)</small><?php endif; ?>
  <br />

  <label>Password:</label>
  <input type="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" />
  <?php if (!empty($errors['password'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['password']); ?>)</small><?php endif; ?>
  <br />

  <label>Street Address:</label><br />
  <textarea name="address" rows="3"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
  <?php if (!empty($errors['address'])): ?><br /><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['address']); ?>)</small><?php endif; ?>
  <br />

  <label>State:</label>
  <select name="state">
    <option value="">--Choose your state--</option>
    <option value="1" <?php echo (isset($_POST['state']) && $_POST['state'] === '1') ? 'selected' : ''; ?>>Gresik</option>
    <option value="2" <?php echo (isset($_POST['state']) && $_POST['state'] === '2') ? 'selected' : ''; ?>>Madura</option>
    <option value="3" <?php echo (isset($_POST['state']) && $_POST['state'] === '3') ? 'selected' : ''; ?>>Mojokerto</option>
    <option value="4" <?php echo (isset($_POST['state']) && $_POST['state'] === '4') ? 'selected' : ''; ?>>Lamongan</option>
  </select>
  <?php if (!empty($errors['state'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['state']); ?>)</small><?php endif; ?>
  <br />

  <input type="hidden" name="country" value="JawaTimur" />

  <label>Gender:</label>
  <input type="radio" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? 'checked' : ''; ?> /> Male
  <input type="radio" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? 'checked' : ''; ?> /> Female
  <?php if (!empty($errors['gender'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['gender']); ?>)</small><?php endif; ?>
  <br />

  <label>Teknik Informatika?</label>
  <input type="checkbox" name="teknik_informatika" value="Yes" <?php echo isset($_POST['teknik_informatika']) ? 'checked' : ''; ?> /><br />

  <input type="submit" name="submit" value="Submit" />
  <input type="reset" name="reset" value="Reset" />
</form>
