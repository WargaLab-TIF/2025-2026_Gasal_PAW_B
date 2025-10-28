<?php
$errors = array();

function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid (letters only)';
    }
}


function validateEmail(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'invalid email format';
    }
}

function validatePassword(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } elseif (strlen($field_list[$field_name]) < 6) {
        $errors[$field_name] = 'too short (min 6 characters)';
    }
}

function validateAddress(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) == '') {
        $errors[$field_name] = 'required';
    }
}


function validateGender(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Data Pribadi</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateAddress($errors, $_POST, 'address');
    validateGender($errors, $_POST, 'gender');

    if ($errors) {
        echo '<h2 style="color:red;">Invalid, correct the following errors:</h2>';
        foreach ($errors as $field => $error)
            echo "<p style='color:red;'>$field: $error</p>";
        include 'form.inc';
    } else {
        echo '<h2 style="color:green;">Form submitted successfully with no errors!</h2>';
    }

} else {
    
    include 'form.inc';
}
?>
</body>
</html>
