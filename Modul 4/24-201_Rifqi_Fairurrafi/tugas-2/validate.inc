<?php
// function validateName($field_list, $field_name){
//     $pattern = "/^[a-zA-Z'-]+$/";

//     if (!isset($field_list[$field_name])){
//         return false;
//     } elseif (!preg_match($pattern, $field_list[$field_name])){
//         return false;
//     }
//     return true;
// }

function validateName(&$errors, $field_list, $field_name){
    $pattern = "/^[a-zA-Z'-]+$/";

    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
        $errors[$field_name] = 'Required';
    } elseif (!preg_match($pattern, $field_list[$field_name])){
        $errors[$field_name] = 'Invalid';
    }

}

function validateEmail(&$errors, $field_list, $field_name){
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))){
        $errors[$field_name] = 'Required';
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Invalid';
    }
}

function validatePassword(&$errors, $field_list, $field_name){
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))){
        $errors[$field_name] = 'Required';
    } elseif (strlen($field_list[$field_name]) < 6) {
        $errors[$field_name] = 'Too short (min 6 chars)';
    }
}

function validateAddress(&$errors, $field_list, $field_name){
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))){
        $errors[$field_name] = 'Required';
    }
}

function validateState(&$errors, $field_list, $field_name){
    if (!isset($field_list[$field_name]) || $field_list[$field_name] == "-1"){
        $errors[$field_name] = 'Please select your state';
    }
}

function validateGender(&$errors, $field_list, $field_name){
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
        $errors[$field_name] = 'Required';
    }
}

?>      