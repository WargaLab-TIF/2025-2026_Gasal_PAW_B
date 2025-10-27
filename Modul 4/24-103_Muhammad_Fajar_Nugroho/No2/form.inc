<form action="register.php" method="post">
  <label for="surname">Nama Belakang</label>
  <input type="text" name="surname" id="surname" value="<?= isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '' ?>">
  <?php if (isset($errors['surname'])): ?>
    <span"><?= htmlspecialchars($errors['surname']) ?></span>
  <?php endif; ?><br>
  <input type="submit" value="Kirim">
</form>
