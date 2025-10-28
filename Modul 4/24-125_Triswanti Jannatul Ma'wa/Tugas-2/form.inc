<?php
// Inisialisasi variabel
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$address = $_POST['address'] ?? '';
$state = $_POST['state'] ?? '-1';
$sex = $_POST['sex'] ?? '';
$vegetarian = isset($_POST['vegetarian']) ? 'checked' : '';

$errors = [];

if (isset($_POST['submit'])) {
    // Validasi sederhana
    if (empty($username)) $errors[] = "Username harus diisi.";
    if (empty($email)) $errors[] = "Email harus diisi.";
    if (empty($password)) $errors[] = "Password harus diisi.";
    if ($state == "-1") $errors[] = "Pilih state terlebih dahulu.";

    if (count($errors) == 0) {
        echo "<p>Form submitted successfully with no errors!</p>";
    } else {
        echo "<p>Terjadi error:</p><ul>";
        foreach ($errors as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul>";
    }
}
?>

<fieldset>
<legend>Proses details</legend>
<form action="" name="myForm" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" size="31" value="<?php echo htmlspecialchars($username); ?>">
    </div>
    <div class="field">
        <label for="email">Email address</label>
        <input type="text" name="email" size="31" value="<?php echo htmlspecialchars($email); ?>">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" size="31" value="<?php echo htmlspecialchars($password); ?>">
    </div>
    <div class="field">
        <label for="address">Address</label>
        <textarea name="address" rows="3" cols="22"><?php echo htmlspecialchars($address); ?></textarea>
    </div>
    <div class="field">
        <label for="state">State</label>
        <select name="state">
            <option value="-1">[choose your state]</option>
            <option value="1" <?= ($state=="1"?"selected":"") ?>>Australian Capital Territory</option>
            <option value="2" <?= ($state=="2"?"selected":"") ?>>Queensland</option>
            <option value="3" <?= ($state=="3"?"selected":"") ?>>Victoria</option>
            <option value="4" <?= ($state=="4"?"selected":"") ?>>New South Wales</option>
            <option value="5" <?= ($state=="5"?"selected":"") ?>>Tasmania</option>
            <option value="6" <?= ($state=="6"?"selected":"") ?>>South Australias</option>
            <option value="7" <?= ($state=="7"?"selected":"") ?>>Western Australis</option>
            <option value="8" <?= ($state=="8"?"selected":"") ?>>Nothern Terriotory</option>
        </select>
    </div>
    <div class="field">
        <label for="sex">Gender</label>
        <input type="radio" name="sex" value="male" <?= ($sex=="male"?"checked":"") ?>>Male
        <input type="radio" name="sex" value="female" <?= ($sex=="female"?"checked":"") ?>>Female
    </div>
    <div class="field">
        <label for="vegetarian">Vegetarian?</label>
        <input type="checkbox" name="vegetarian" <?= $vegetarian ?>>
    </div>
    <div class="field">
        <label>&nbsp;</label>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset" name="reset">
    </div>
</form>
</fieldset>
