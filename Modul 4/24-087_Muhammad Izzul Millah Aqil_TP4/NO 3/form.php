<?php

$errors = array();


function validateEventForm(&$errors, $data) {
    // 1
    if (!isset($data['fullname']) || empty(trim($data['fullname']))) {
        $errors['fullname'] = 'required';
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $data['fullname'])) {
        $errors['fullname'] = 'invalid (letters only)';
    }

    // 2
    if (!isset($data['email']) || empty(trim($data['email']))) {
        $errors['email'] = 'required';
    } elseif (!filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'invalid email format';
    }

    // 3
    if (!isset($data['phone']) || empty(trim($data['phone']))) {
        $errors['phone'] = 'required';
    } elseif (!preg_match("/^[0-9]{10,13}$/", $data['phone'])) {
        $errors['phone'] = 'invalid (must be 10–13 digits)';
    }

    // 4
    if (!empty(trim($data['website']))) {
        if (!filter_var(trim($data['website']), FILTER_VALIDATE_URL)) {
            $errors['website'] = 'invalid URL format';
        }
    }

    // 5
    if (!isset($data['tickets']) || $data['tickets'] === '') {
        $errors['tickets'] = 'required';
    } elseif (!is_numeric($data['tickets'])) {
        $errors['tickets'] = 'must be numeric';
    } elseif ($data['tickets'] < 1) {
        $errors['tickets'] = 'must be at least 1';
    }

    // 6
    if (!isset($data['event_date']) || empty($data['event_date'])) {
        $errors['event_date'] = 'required';
    } else {
        $tgl = explode('-', $data['event_date']);
        if (count($tgl) == 3) {
            if (!checkdate($tgl[1], $tgl[2], $tgl[0])) {
                $errors['event_date'] = 'invalid date';
            }
        } else {
            $errors['event_date'] = 'invalid format (YYYY-MM-DD)';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validateEventForm($errors, $_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Event</title>
</head>
<body>
    <h2>Form Pendaftaran Event</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($errors) {
            echo "<h3 style='color:red;'>Please fix the following errors:</h3>";
            foreach ($errors as $field => $error) {
                echo "<p style='color:red;'>$field: $error</p>";
            }
        } else {
            echo "<h3 style='color:green;'>Form submitted successfully!</h3>";
            echo "<h4>Data Anda:</h4>";
            echo "<ul>";
            echo "<li><strong>Full Name:</strong> " . htmlspecialchars($_POST['fullname']) . "</li>";
            echo "<li><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</li>";
            echo "<li><strong>Phone:</strong> " . htmlspecialchars($_POST['phone']) . "</li>";
            echo "<li><strong>Website:</strong> " . htmlspecialchars($_POST['website']) . "</li>";
            echo "<li><strong>Tickets:</strong> " . htmlspecialchars($_POST['tickets']) . "</li>";
            echo "<li><strong>Event Date:</strong> " . htmlspecialchars($_POST['event_date']) . "</li>";
            echo "</ul>";
        }
    }
    ?>

    <form method="post" action="form_event.php">
        <label>Full Name:</label><br>
        <input type="text" name="fullname"
               value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"
               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>

        <label>Phone Number:</label><br>
        <input type="text" name="phone"
               value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"><br><br>

        <label>Website (optional):</label><br>
        <input type="text" name="website"
               value="<?php echo isset($_POST['website']) ? htmlspecialchars($_POST['website']) : ''; ?>"><br><br>

        <label>Number of Tickets:</label><br>
        <input type="number" name="tickets"
               value="<?php echo isset($_POST['tickets']) ? htmlspecialchars($_POST['tickets']) : ''; ?>"><br><br>

        <label>Event Date:</label><br>
        <input type="date" name="event_date"
               value="<?php echo isset($_POST['event_date']) ? htmlspecialchars($_POST['event_date']) : ''; ?>"><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
