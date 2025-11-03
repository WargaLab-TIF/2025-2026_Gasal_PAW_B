<?php
function validateName(&$errors, $data) {
    if (empty(trim($data['surname'] ?? ''))) {
        $errors['surname'] = "is required";
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $data['surname'])) {
        $errors['surname'] = "must contain only letters";
    }
}

function validateEmail(&$errors, $data) {
    if (empty(trim($data['email'] ?? ''))) {
        $errors['email'] = "is required";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "is not a valid email";
    }
}

function validatePassword(&$errors, $data) {
    if (empty($data['password'] ?? '')) {
        $errors['password'] = "is required";
    } elseif (strlen($data['password']) < 6) {
        $errors['password'] = "must be at least 6 characters";
    }
}
?>
