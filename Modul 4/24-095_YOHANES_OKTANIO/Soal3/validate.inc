<?php
$errors = [];
$values = [
    'name' => '',
    'student_id' => '',
    'email' => '',
    'password' => '',
    'day' => '',
    'month' => '',
    'year' => '',
    'gpa' => '',
    'website' => '',
    'ip' => '',
    'bio' => '',
];


    $values['student_id'] = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
    if ($values['student_id'] === '') {
        $errors['student_id'] = 'Student ID is required.';
    } else if ( !is_numeric($values['student_id'])) {
        $errors['student_id'] = 'Student ID is numeric.';
    }


    $values['name'] = isset($_POST['name']) ? trim($_POST['name']) : '';
    if ($values['name'] === '') {
        $errors['name'] = 'Name is required.';
    } else {

        $name_clean = strtolower($values['name']);
        $name_clean = ucwords($name_clean);
        $values['name'] = $name_clean;
    }



    $raw_email = isset($_POST['email']) ? trim($_POST['email']) : '';
    if ($raw_email === '') {
        $errors['email'] = 'Email is required.';
    } else {

        if (!filter_var($raw_email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email does not pass FILTER_VALIDATE_EMAIL.';
        } else {
            $values['email'] = strtolower($raw_email);
        }
    }


    $raw_website = isset($_POST['website']) ? trim($_POST['website']) : '';
    if ($raw_website !== '') {
        if (!filter_var($raw_website, FILTER_VALIDATE_URL)) {
            $errors['website'] = 'Website is not a valid URL.';
        } else {
            $values['website'] = $raw_website;
        }
    }


    $raw_gpa = isset($_POST['gpa']) ? trim($_POST['gpa']) : '';
    if ($raw_gpa !== '') {

        $raw_gpa = str_replace(',', '.', $raw_gpa);
        if (filter_var($raw_gpa, FILTER_VALIDATE_FLOAT) === false) {
            $errors['gpa'] = 'GPA must be a valid number (float).';
        } else {
            $values['gpa'] = (float)$raw_gpa;
        }
    }


    $raw_ip = isset($_POST['ip']) ? trim($_POST['ip']) : '';
    if ($raw_ip !== '') {
        if (!filter_var($raw_ip, FILTER_VALIDATE_IP)) {
            $errors['ip'] = 'IP address is not valid.';
        } else {
            $values['ip'] = $raw_ip;
        }
    }


    $raw_age = isset($_POST['age']) ? trim($_POST['age']) : '';
    if ($raw_age !== '') {
        if (!is_numeric($raw_age)) {
            $errors['age'] = 'Age must be numeric.';
        } else {
            $age_val = $raw_age + 0;
            if (is_int($age_val)) {
            }
            $values['age'] = $age_val;
        }
    }


    $values['day'] = isset($_POST['day']) ? (int)$_POST['day'] : 0;
    $values['month'] = isset($_POST['month']) ? (int)$_POST['month'] : 0;
    $values['year'] = isset($_POST['year']) ? (int)$_POST['year'] : 0;
    if ($values['day'] === 0 || $values['month'] === 0 || $values['year'] === 0) {
        $errors['dob'] = 'Full date of birth is required.';
    } else {
        if (!checkdate($values['month'], $values['day'], $values['year'])) {
            $errors['dob'] = 'Date of birth is not a valid calendar date.';
        } else {

            $dob_ts = strtotime(sprintf('%04d-%02d-%02d', $values['year'], $values['month'], $values['day']));
            if ($dob_ts > time()) {
                $errors['dob'] = 'Date of birth cannot be in the future.';
            } else {
                $values['dob_display'] = date('Y-m-d', $dob_ts);
            }
        }
    }


    $values['password'] = isset($_POST['password']) ? $_POST['password'] : '';
    if ($values['password'] === '') {
        $errors['password'] = 'Password is required.';
    } else {
        if (strlen($values['password']) < 8) {
            $errors['password'] = 'Password must be at least 8 characters long.';
        }

        if (!preg_match('/(?=.*[A-Za-z])(?=.*\d)/', $values['password'])) {
            $errors['password'] = ($errors['password'] ?? '') . ' Password must contain at least one letter and one number.';
        }
    }


    if (!isset($errors['email'])) {

        $email_pattern = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';
        if (!preg_match($email_pattern, $values['email'])) {
            $errors['email'] = 'Email does not match advanced regex pattern.';
        }
    }


    $values['bio'] = isset($_POST['bio']) ? trim($_POST['bio']) : '';
    if ($values['bio'] !== '' && !is_string($values['bio'])) {
        $errors['bio'] = 'Bio must be a string.';
    } elseif (strlen($values['bio']) > 500) {
        $errors['bio'] = 'Bio must not exceed 500 characters.';
    }


