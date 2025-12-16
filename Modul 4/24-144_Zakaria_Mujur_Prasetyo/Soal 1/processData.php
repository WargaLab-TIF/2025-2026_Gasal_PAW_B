<?php
require 'validate.inc';
$errors = [];

if (validateName($errors, $_POST, 'surname')) {
	echo 'Data OK!';
} else {
	if (isset($errors['surname'])) {
		if ($errors['surname'] === 'required') {
			echo 'Data invalid! (Surname required)';
		} elseif ($errors['surname'] === 'invalid') {
			echo 'Data invalid! (Surname invalid)';
		} else {
			echo 'Data invalid!';
		}
	} else {
		echo 'Data invalid!';
	}
}
?>