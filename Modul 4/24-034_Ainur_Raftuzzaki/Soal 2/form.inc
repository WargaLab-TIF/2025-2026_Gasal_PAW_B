<form action="formValidation.php" method="POST">

    <label for="Nama">Nama:</label><br>
    <input type="text" id="Nama" name="Nama" 
           value="<?= htmlspecialchars($_POST['Nama'] ?? '') ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" 
           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" 
           value="<?= htmlspecialchars($_POST['password'] ?? '') ?>"><br><br>

    <label for="Alamat">Alamat:</label><br>
    <textarea id="Alamat" name="Alamat" rows="3" cols="30"><?= htmlspecialchars($_POST['Alamat'] ?? '') ?></textarea><br><br>

    <label for="state">State:</label><br>
    <select id="state" name="state">
        <option value="">--Pilih State--</option>
        <option value="New South Wales" <?= (($_POST['state'] ?? '') == 'New South Wales') ? 'selected' : '' ?>>New South Wales</option>
        <option value="Queensland" <?= (($_POST['state'] ?? '') == 'Queensland') ? 'selected' : '' ?>>Queensland</option>
        <option value="Victoria" <?= (($_POST['state'] ?? '') == 'Victoria') ? 'selected' : '' ?>>Victoria</option>
        <option value="Western Australia" <?= (($_POST['state'] ?? '') == 'Western Australia') ? 'selected' : '' ?>>Western Australia</option>
    </select><br><br>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="Jenis_Kelamin" value="Male" 
        <?= (($_POST['Jenis_Kelamin'] ?? '') == 'Male') ? 'checked' : '' ?>> Laki-laki<br>
    <input type="radio" name="Jenis_Kelamin" value="Female" 
        <?= (($_POST['Jenis_Kelamin'] ?? '') == 'Female') ? 'checked' : '' ?>> Perempuan<br><br>

    <label>Vegetarian?</label>
    <input type="checkbox" name="vegetarian" value="Yes" 
        <?= isset($_POST['vegetarian']) ? 'checked' : '' ?>> Yes<br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">

</form>