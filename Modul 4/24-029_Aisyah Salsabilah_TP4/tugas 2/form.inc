<form action="formData.php" method="post">
  <label for="firstname">First Name:</label>
  <input type="text" name="firstname" id="firstname"
         value="<?php if (isset($_POST['firstname'])) echo htmlspecialchars($_POST['firstname']); ?>">
  <br><br>

  <label for="surname">Surname:</label>
  <input type="text" name="surname" id="surname"
         value="<?php if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>">
  <br><br>

  <label for="email">Email:</label>
  <input type="text" name="email" id="email"
         value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
  <br><br>

  <input type="submit" value="Submit">
</form>