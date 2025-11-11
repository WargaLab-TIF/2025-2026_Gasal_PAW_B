<?php
//validatename array 
// function validateName(&$errors, $field_list, $field_name){
//     $pattern = "/^[a-zA-Z'-]+$/"; // format surname (alfabet)
//     if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
//         $errors[$field_name] = 'required';
//     } else{
//         if (!preg_match($pattern, $field_list[$field_name])){
//             $errors[$field_name] = 'invalid';
//         }
//     }
// }
?>
<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/"; 
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'Surname is required';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Surname must contain only letters, apostrophes, or hyphens';
    }
}

function validateEmail(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'Email is required';
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Invalid email format';
    }
}

function validatePassword(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'Password is required';
    } elseif (strlen($field_list[$field_name]) < 6) {
        $errors[$field_name] = 'Password must be at least 6 characters';
    }
}

function validateAddress(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'Address is required';
    }
}

function validateState(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'State is required';
    }
}

function validateGender(&$errors, $field_list, $field_name) {
    if (!isset($field_list[$field_name])) {
        $errors[$field_name] = 'Gender is required';
    }
}
?>

