<?php
// function validateName(&$errors,$field_list,$field_name){
//     $pattern = "/^[a-zA-Z'-]+$/";
//     if(!isset($field_list[$field_name])) {
//         $errors[$field_name] = 'required';
//     }
//     if (!preg_match($pattern, $field_list[$field_name])){
//         $errors[$field_name] = 'invalid';
//     }
// }
function validateName(&$error,$field_list, $field_name){
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty ($field_list[$field_name])){
        $error[$field_name] = 'required';
    }elseif (!preg_match($pattern, $field_list[$field_name]))
        $error[$field_name] = 'invalid';
}
function validateEmail(&$error, $field_list, $field_name, $label) {
    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $error[$field_name] = "$label is required";
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
        $error[$field_name] = "$label must be a valid email address";
    }
}
function validateAlamat(&$error,$field_list, $field_name) {
    if (trim($field_list[$field_name]) == ""){
        $error[$field_name]="alamat tidak boleh kosong";
    }
}