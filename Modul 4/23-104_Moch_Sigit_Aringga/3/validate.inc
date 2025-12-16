<?php
function validateStudentData(&$errors, $data) {
    // 1. Nama (regex + string)
    $name = trim($data['name'] ?? '');
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    } elseif (!preg_match("/^[a-zA-Z' -]+$/", $name)) {
        $errors['name'] = 'Name may only contain letters and spaces';
    } elseif (strlen($name) < 3) {
        $errors['name'] = 'Name must be at least 3 characters long';
    }

    // 2. Email (filter)
    $email = trim($data['email'] ?? '');
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    // 3. Umur (type testing)
    $age = trim($data['age'] ?? '');
    if (empty($age)) {
        $errors['age'] = 'Age is required';
    } elseif (!is_numeric($age)) {
        $errors['age'] = 'Age must be numeric';
    } elseif ($age < 17 || $age > 60) {
        $errors['age'] = 'Age must be between 17 and 60';
    }

    // 4. Password (regex panjang dan kombinasi huruf/angka)
    $password = $data['password'] ?? '';
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors['password'] = 'Password must contain at least one uppercase letter and one number';
    }

    // 5. Tanggal Lahir (checkdate)
    $birth = $data['birth'] ?? '';
    if (empty($birth)) {
        $errors['birth'] = 'Birth date is required';
    } else {
        $parts = explode('-', $birth);
        if (count($parts) === 3) {
            [$year, $month, $day] = $parts;
            if (!checkdate((int)$month, (int)$day, (int)$year)) {
                $errors['birth'] = 'Invalid date';
            }
        } else {
            $errors['birth'] = 'Date must be in YYYY-MM-DD format';
        }
    }
}
?>
