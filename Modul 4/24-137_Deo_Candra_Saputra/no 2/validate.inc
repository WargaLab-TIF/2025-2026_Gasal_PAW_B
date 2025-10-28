<?php
// function validateName(&$errors, $field_list, $field_name) {
//     $pattern = "/^[a-zA-Z'-]+$/"; 

//     if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
//         $errors[$field_name] = 'required';
//     } elseif (!preg_match($pattern, $field_list[$field_name])) {
//         $errors[$field_name] = 'invalid (letters only)';
//     }
// }
// soal 2.9 
function validateForm(&$errors, $data) {
    $pattern = "/^[a-zA-Z'-]+$/";
    if (empty($data['surname'])) {
        $errors['surname'] = 'Fullname is required';
    } elseif (!preg_match($pattern, $data['surname'])) {
        $errors['surname'] = 'Fullname may contain only letters, apostrophes, or hyphens';
    }

    if (empty($data['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($data['password'])) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($data['password']) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    }

    if (empty($data['address'])) {
        $errors['address'] = 'Address is required';
    }

    if (!isset($data['state']) || $data['state'] == '-1') {
        $errors['state'] = 'Please choose your state';
    }

    if (empty($data['sex'])) {
        $errors['sex'] = 'Please select your gender';
    }
}

?>
