<form method="post" action="">
    <label>Surname:</label><br>
    <input type="text" name="surname" value="<?php echo $_POST['surname'] ?? ''; ?>"><br>
    <?php if (!empty($errors['surname'])) echo "Surname {$errors['surname']}<br>"; ?>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"><br>
    <?php if (!empty($errors['email'])) echo "Email {$errors['email']}<br>"; ?>

    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <?php if (!empty($errors['password'])) echo "Password {$errors['password']}<br>"; ?>

    <br>
    <input type="submit" value="Submit">
</form>
