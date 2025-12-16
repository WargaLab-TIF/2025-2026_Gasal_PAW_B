<?php
$errors = array();
if (isset($_POST['surname'])) {
  require 'validate.inc';
  validateName($errors, $_POST, 'surname');
  validateEmailField($errors, $_POST, 'email');
  validatePasswordField($errors, $_POST, 'password');
  validateRequiredText($errors, $_POST, 'address', 5); 
  validateSelect($errors, $_POST, 'state', ['1','2','3','4']);
  validateRadio($errors, $_POST, 'gender', ['Male','Female']);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Register Form (Self-Submission)</title>
  </head>
  <body>
    <?php if (isset($_POST['surname'])): ?>
      <?php if ($errors): ?>
        <h3>Invalid, correct the following errors:</h3>
        <?php foreach ($errors as $field => $error): ?>
          <?php echo htmlspecialchars($field), ' ', htmlspecialchars($error), '<br />'; ?>
        <?php endforeach; ?>
        <?php include 'form.inc'; ?>
      <?php else: ?>
        <?php echo 'Form submitted successfully with no errors'; ?>
      <?php endif; ?>
    <?php else: ?>
      <?php include 'form.inc'; ?>
    <?php endif; ?>
  </body>
</html>
