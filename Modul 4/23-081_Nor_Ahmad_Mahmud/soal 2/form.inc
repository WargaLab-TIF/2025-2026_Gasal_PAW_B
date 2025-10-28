<form action="form.php" method="POST">
    <p>
        Surname: 
        <input type="text" name="surname" 
            value="<?php if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>">
    </p>
    <p>
        Email: 
        <input type="text" name="email" 
            value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
    </p>
    <p>
        Umur: 
        <input type="text" name="umur" 
            value="<?php if (isset($_POST['umur'])) echo htmlspecialchars($_POST['umur']); ?>">
    </p>
    <input type="submit" value="Submit">
</form>
