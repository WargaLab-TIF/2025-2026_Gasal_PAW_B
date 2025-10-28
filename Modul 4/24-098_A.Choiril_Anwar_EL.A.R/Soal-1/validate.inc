<?php
function validateName($field_list, $field_name)
{
    if (!isset($field_list[$field_name])) 
        return false;

    $pattern = "/^[a-zA-Z'-]+$/"; // hanya huruf, apostrof, dan tanda minus
    if (!preg_match($pattern, $field_list[$field_name])) 
        return false;

    return true;
}
?>
