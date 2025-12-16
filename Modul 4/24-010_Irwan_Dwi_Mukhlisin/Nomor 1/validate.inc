<?php
// function validateName($field_list,$field_name){
//     if(!isset($field_list[$field_name])){
//         return false;
//     }
//     $pattern = "/^[a-zA-Z'-]+$/";
//     if (!preg_match($pattern, $field_list[$field_name])){
//         return false;
//     }
//     return true;
// }
function validateName(&$error,$field_list, $field_name){
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty ($field_list[$field_name])){
        $error[$field_name] = 'required';
    }elseif (!preg_match($pattern, $field_list[$field_name]))
        $error[$field_name] = 'invalid';
} 