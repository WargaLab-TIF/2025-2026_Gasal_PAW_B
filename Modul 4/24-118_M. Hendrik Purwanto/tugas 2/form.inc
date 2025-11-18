<form action="index.php" method="POST">
    <label for="fname">First Name: </label><br>
    <input type="text" name="fname" id="fname" value="<?php echo isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : ''; ?>">
    <span><?php echo isset($errors['fname']) ? $errors['fname'] : ''; ?></span>
    <br>
    
    <label for="surname">Surname: </label><br>
    <input type="text" name="surname" id="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
    <span><?php echo isset($errors['surname']) ? $errors['surname'] : ''; ?></span>
    <br><br>
    
    <button type="submit" name="submit">Submit</button>
</form>