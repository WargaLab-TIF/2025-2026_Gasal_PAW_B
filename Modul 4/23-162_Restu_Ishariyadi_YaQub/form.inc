<form method="POST" action="tugas-1.php">
    <div>
        Surname: 
        <input 
            type="text" 
            name="surname" 
            value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>"
        >
    </div>
    <div style="margin-top:10px;">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
    </div>
    <input type="submit" value="Kirim" style="margin-top:10px;">
</form>