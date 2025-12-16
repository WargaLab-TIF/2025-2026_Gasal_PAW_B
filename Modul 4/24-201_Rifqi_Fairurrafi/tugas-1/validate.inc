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
?>      