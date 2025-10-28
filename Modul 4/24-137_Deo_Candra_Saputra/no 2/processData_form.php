<!-- soal 2.1 -->
<!-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <title>Process Data Form</title>
  <style>
    body {font-family: Arial, sans-serif; background:#f5f5f5;}
    form {width:420px; margin:50px auto; background:#e8e6fa; border:1px solid #999; border-radius:4px; padding:20px 30px; box-shadow:2px 2px 8px rgba(0,0,0,0.2);}
    legend {font-weight:bold; font-size:18px; color:#333; margin-bottom:10px;}
    .field {margin-bottom:12px; display:flex; align-items:center;}.field label {width:150px; font-weight:bold; color:#333;}
    .field input, .field select, .field textarea {flex:1; padding:4px; border:1px solid #aaa; border-radius:3px; font-size:14px;}.field textarea {resize:none;}.field input[type=submit], .field input[type=reset] {width:auto; padding:6px 14px; border:1px solid #666; border-radius:3px; background:#ddd; cursor:pointer; font-weight:bold; margin-right:8px;}
  </style>
</head>
<body>
  <h2>Register</h2>
  <legend>Person Details:</legend> -->
  <!-- soal 2.2 -->
  <!-- <form name="myForm" action="processData_form.php" method="POST">
    <div class="field">
        <label for="surname">Fullname:</label>
        <input type="text" name="surname" size="31" />
    </div>
    <div class="field">
        <label for="email">Email address:</label>
        <input type="email" name="email" size="31"/>
    </div>
    <div class="field">
        <label for="password">Password:</label>
        <input type="password" name="password" size="31"/>
    </div>
    <div class="field">
        <label for="address">Street Address:</label>
        <textarea name="address" rows="3" cols="22"></textarea>
    </div>
    <div class="field">
        <label for="state">State:</label>
        <select name="state">
          <option value="-1">[Choose your state]</option>
          <option value="1">Australian Capital Territory</option>
          <option value="2">Queensland</option>
          <option value="3">Victoria</option>
          <option value="4">New South Wales</option>
          <option value="5">Tesmania</option>
          <option value="6">South Australia</option>
          <option value="7">Western Australia</option>
          <option value="8">Northern Territory</option>
        </select>
    </div>
    <div class="field">
        <input type="hidden" name="country" value="Australia" />
    </div>
    <div class="field">
        <label for="sex">Gender:</label>
        <input type="radio" name="sex" value="Male" />Male
        <input type="radio" name="sex" value="Female" />Female
    </div>
    <div class="field">
        <label for="vegetarian">Vegetarian?</label>
        <input type="checkbox" name="vegetarian"/>
    </div>
    <div class="field">
        <label></label>
        <input type="submit" value="Submit" name="Submit"/><input type="reset" value="Reset" name="Reset"/>
    </div>
  </form>
</body>
</html> -->

<!-- soal 2.5 -->
<?php
// $errors = array();
// if (isset($_POST['surname'])) {
//     require 'validate.inc';
//     validateName($errors, $_POST, 'surname');

//     if ($errors) {
//         echo '<h1>Invalid, correct the following errors:</h1>';
//         foreach ($errors as $field => $error) {
//             echo "<p><strong>$field</strong> : $error</p>";
//         }
//         include 'form.inc';
//     } else {
//         echo '<h2>Form submitted successfully with no errors</h2>';
//     }
// } else {
//     include 'form.inc';
// }
?>
<!-- soal 2.9 -->
<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validate.inc';
    validateForm($errors, $_POST);

    if ($errors) {
        echo "<h2 style='color:red;'>Please correct the following errors:</h2>";
        include 'form.inc';
    } else {
        echo "<h2 style='color:green;'>Form submitted successfully with no errors!</h2>";
        echo "<p><b>Fullname:</b> " . htmlspecialchars($_POST['surname']) . "</p>";
        echo "<p><b>Email:</b> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><b>Address:</b> " . htmlspecialchars($_POST['address']) . "</p>";
        echo "<p><b>State:</b> " . htmlspecialchars($_POST['state']) . "</p>";
        echo "<p><b>Gender:</b> " . htmlspecialchars($_POST['sex']) . "</p>";
        echo "<p><b>Vegetarian:</b> " . (isset($_POST['vegetarian']) ? 'Yes' : 'No') . "</p>";
    }
} else {
    include 'form.inc';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Process Data Form</title>
  <style>
    body {font-family: Arial, sans-serif; background:#f5f5f5;}
    .field {margin-bottom:12px; display:flex; align-items:center;}
    .field label {width:150px; font-weight:bold; color:#333;}
    .field input, .field select, .field textarea {
      flex:1; padding:4px; border:1px solid #aaa; border-radius:3px; font-size:14px;
    }
    .field textarea {resize:none;}
    .field input[type=submit], .field input[type=reset] {
      width:auto; padding:6px 14px; border:1px solid #666; border-radius:3px;
      background:#ddd; cursor:pointer; font-weight:bold; margin-right:8px;
    }
  </style>
</head>
<body>
</body>
</html>

