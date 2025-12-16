<form name="myForm" action="processData_form.php" method="POST">
    <div class="field">
        <label for="surname">Surname: </label>
        <input type="text" name="surname" size="31" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">
    </div>
    <div class="field">
        <label>&nbsp;</label>
        <input type="submit" value="submit" name="submit"><input type="reset" value="reset" name="reset">
     </div>
</form>
