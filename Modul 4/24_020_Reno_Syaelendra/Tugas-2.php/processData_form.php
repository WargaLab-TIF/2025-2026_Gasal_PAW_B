<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require 'validate.inc';

  // Validasi setiap field
  validateName($errors, $_POST, 'surname');
  validateEmailField($errors, $_POST, 'email');
  validatePasswordField($errors, $_POST, 'password');
  validateRequiredText($errors, $_POST, 'address', 5);
  validateSelect($errors, $_POST, 'state', ['Jakarta','Jawa Barat','Jawa Timur','Bali']);
  validateRadio($errors, $_POST, 'gender', ['Male','Female']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Register Form (Self-Submission)</title>
</head>
<body>
  <h2>Formulir Pendaftaran</h2>

  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <?php if ($errors): ?>
      <h3 style="color:red;">Invalid, correct the following errors:</h3>
      <?php foreach ($errors as $field => $error): ?>
        <?php echo htmlspecialchars($field) . ' : ' . htmlspecialchars($error) . '<br />'; ?>
      <?php endforeach; ?>
      <?php include 'form.inc'; ?>
    <?php else: ?>
      <p style="color:green;">Form submitted successfully with no errors.</p>
    <?php endif; ?>
  <?php else: ?>
    <?php include 'form.inc'; ?>
  <?php endif; ?>
</body>
</html>