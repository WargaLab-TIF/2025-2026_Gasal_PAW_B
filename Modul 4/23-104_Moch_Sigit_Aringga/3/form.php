<?php
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require 'validate.inc';
    validateStudentData($errors, $_POST);

    if (empty($errors)) {
        echo "<h2 style='color:green;'>✅ Data submitted successfully!</h2>";
        echo "<p><b>Name:</b> " . htmlspecialchars($_POST['name']) . "</p>";
        echo "<p><b>Email:</b> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><b>Age:</b> " . htmlspecialchars($_POST['age']) . "</p>";
        echo "<p><b>Birth Date:</b> " . htmlspecialchars($_POST['birth']) . "</p>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body { font-family: Arial; background:#f0f2f5; padding:30px;}
        form { background:#fff; padding:25px; border-radius:10px; max-width:500px; margin:auto; box-shadow:0 4px 10px rgba(0,0,0,0.1);}
        .field { margin-bottom:15px;}
        label { display:block; font-weight:bold; margin-bottom:5px;}
        input[type="text"], input[type="email"], input[type="password"], input[type="date"], input[type="number"] {
            width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;
        }
        .error { color:red; font-size:0.9em; margin-top:3px;}
        button { background:#1a4f8b; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;}
        button:hover { background:#154070;}
    </style>
</head>
<body>
<form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Form Input Data Mahasiswa</h2>

    <div class="field">
        <label>Nama Lengkap:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
        <?php if (!empty($errors['name'])) echo "<div class='error'>{$errors['name']}</div>"; ?>
    </div>

    <div class="field">
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <?php if (!empty($errors['email'])) echo "<div class='error'>{$errors['email']}</div>"; ?>
    </div>

    <div class="field">
        <label>Umur:</label>
        <input type="number" name="age" value="<?= htmlspecialchars($_POST['age'] ?? '') ?>">
        <?php if (!empty($errors['age'])) echo "<div class='error'>{$errors['age']}</div>"; ?>
    </div>

    <div class="field">
        <label>Password:</label>
        <input type="password" name="password">
        <?php if (!empty($errors['password'])) echo "<div class='error'>{$errors['password']}</div>"; ?>
    </div>

    <div class="field">
        <label>Tanggal Lahir:</label>
        <input type="date" name="birth" value="<?= htmlspecialchars($_POST['birth'] ?? '') ?>">
        <?php if (!empty($errors['birth'])) echo "<div class='error'>{$errors['birth']}</div>"; ?>
    </div>

    <button type="submit">Submit</button>
</form>
</body>
</html>
