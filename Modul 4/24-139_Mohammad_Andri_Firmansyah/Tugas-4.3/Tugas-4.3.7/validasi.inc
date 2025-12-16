<?php

function validasiNama($method, $name)
{
    $cocok1 = "/^[a-zA-Z ]+$/";
    if (!isset($method[$name]) || empty($method[$name]))
        return False;
    elseif (!preg_match($cocok1, $method[$name]))
        return False;
    else
        return True;
}

function validasiNim($method, $name)
{
    if (!isset($method[$name]) || empty($method[$name]))
        return False;
    elseif (!is_numeric($method[$name]))
        return False;
    else
        return True;
}

function validasiEmail($method, $name)
{
    $cocok2 = "/^[a-zA-Z1-9]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/";
    if (!isset($method[$name]) || empty($method[$name]))
        return False;
    elseif (!preg_match($cocok2, $method[$name]))
        return False;
    else
        return True;
}

function validasiPassword($method, $name)
{
    if (!isset($method[$name]) || empty($method[$name]))
        return False;
    elseif (strlen($method[$name]) < 8)
        return False;
    else
        return True;
}

?>