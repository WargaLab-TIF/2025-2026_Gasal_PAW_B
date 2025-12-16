<!-- File: form.inc -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Form Input Data Mahasiswa</h2>

    <label for="name">Nama:</label><br>
    <input type="text" name="name" id="name"
        value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="text" name="email" id="email"
        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password"><br><br>

    <label for="age">Umur:</label><br>
    <input type="text" name="age" id="age"
        value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>"><br><br>

    <label for="birthdate">Tanggal Lahir:</label><br>
    <input type="date" name="birthdate" id="birthdate"
        value="<?php echo isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : ''; ?>"><br><br>

    <input type="submit" value="Kirim Data">
</form>