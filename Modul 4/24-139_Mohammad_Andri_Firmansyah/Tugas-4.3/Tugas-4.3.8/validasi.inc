<?php

function validasiNama(&$errors, $method, $name)
{
    $cocok1 = "/^[a-zA-Z ]+$/";
    if (!isset($method[$name]) || empty($method[$name]))
        $errors[$name] = ' harus diisi'; 
    else
        if (!preg_match($cocok1, $method[$name]))
            $errors[$name] = ' invalid';
}

function validasiNim(&$errors, $method, $name)
{
    if (!isset($method[$name]) || empty($method[$name]))
        $errors[$name] = ' harus diisi'; 
    else
        if (!is_numeric($method[$name]))
            $errors[$name] = ' harus berupa angka';
}

function validasiEmail(&$errors, $method, $name)
{
    $cocok2 = "/^[a-zA-Z1-9]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/";
    if (!isset($method[$name]) || empty($method[$name]))
        $errors[$name] = ' harus diisi'; 
    else
        if (!preg_match($cocok2, $method[$name]))
            $errors[$name] = ' tidak valid';
}

function validasiPassword(&$errors, $method, $name)
{
    if (!isset($method[$name]) || empty($method[$name]))
        $errors[$name] = ' harus diisi'; 
    else
        if (strlen($method[$name]) < 8)
            $errors[$name] = ' minimal 8 karakter';
}

?>