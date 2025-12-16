<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Implementasi filter</h2>
    <form action="Tugas-4.3.3.php" method="post">
        <label for="email">
            Masukan Email:
            <input type="text" name="email">
        </label>
        <br>
        <label for="url">
            Masukan URL:
            <input type="text" name="url">
        </label>
        <br>
        <label for="ip">
            Masukan IP Address:
            <input type="text" name="ip">
        </label>
        <br>
        <label for="float">
            Masukan Float:
            <input type="text" name="float">
        </label>
        <br>
        <button type="submit" name="submit">Submit</button>
        <br><br>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $ip = $_POST['ip'];
        $float = $_POST['float'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email is valid <br>";
        } else {
            echo "Email is invalid <br>";
        }

        if ($url) {
            echo "URL is valid <br>";
        } else {
            echo "URL is invalid <br>";
        }

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            echo "IP Address is valid <br>";
        } else {
            echo "IP Address is invalid <br>";
        }

        if (filter_var($float, FILTER_VALIDATE_FLOAT)) {
            echo "Float is valid <br>";
        } else {
            echo "Float is invalid <br>";
        }
    }
    ?>
</body>
</html>