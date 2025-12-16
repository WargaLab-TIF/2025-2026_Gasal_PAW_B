<?php
function isEmpty($data) {
    return trim($data) === '';
}
function isValidPhone($data) {
    $cleaned = preg_replace('/[\s\-\(\)]+/', '', $data);
    if (isEmpty($cleaned)) { return true; }
    return preg_match('/^\+?[0-9]+$/', $cleaned);
}
function isMaxLength($data, $maxLength) {
    return strlen($data) > $maxLength;
}
?>