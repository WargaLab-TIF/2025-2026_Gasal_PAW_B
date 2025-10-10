<?php

$items = [
    'Apple' => 2,
    'Banana' => 1.5,
    'Orange' => 3,
    'Grapes' => 4
];


session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION['totalPrice'] = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $selectedItems = $_POST['items'] ?? [];

    foreach ($selectedItems as $item) {
        if (array_key_exists($item, $items)) {
            $_SESSION['cart'][] = $item;
            $_SESSION['totalPrice'] += $items[$item];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Register - Menu</title>
</head>
<body>
    <h2>Cash Register - Menu</h2>
    
    <form method="post">
        <h3>Select Items:</h3>
        <?php foreach ($items as $item => $price): ?>
            <label>
                <input type="checkbox" name="items[]" value="<?php echo $item; ?>">
                 <?php echo $item; ?> ($<?php echo $price; ?>)
            </label><br>
        <?php endforeach; ?>
        <input type="submit" value="Add to Cart">
    </form>

    <h3>Items in Cart:</h3>
    <ul>
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cartItem) {
                echo "<li>$cartItem</li>";
            }
        } else {
            echo "<li>No items selected</li>";
        }
        ?>
    </ul>

    <h3>Total Price: $<?php echo number_format($_SESSION['totalPrice'], 2); ?></h3>

</body>
</html>
