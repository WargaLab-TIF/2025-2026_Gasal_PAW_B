<?php
$conn = new mysqli("localhost", "root", "", "paw_mod6", 3307);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $invoice_no = $_POST['invoice_no'];
    $date = $_POST['date'];
    $customer = $_POST['customer'];

     
    $conn->query("INSERT INTO invoice (invoice_no, date, customer) 
                  VALUES ('$invoice_no', '$date', '$customer')");

  
    $invoice_id = $conn->insert_id;

    for ($i = 0; $i < 3; $i++) { 
        $item_name = $_POST["item_name"][$i];
        $qty = $_POST["qty"][$i];
        $price = $_POST["price"][$i];
        
        if(!empty($item_name)){
           
            $conn->query("INSERT INTO items (invoice_id, item_name, qty, price)
                          VALUES ('$invoice_id', '$item_name', '$qty', '$price')");
        }
    }
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice Form (Master-Detail)</title>
</head>
<body>
<h2>Invoice Entry Form</h2>

<form method="post" action="">
    <fieldset>
        <legend>Master Data (Invoice)</legend>
        <label>Invoice No:</label><br>
        <input type="text" name="invoice_no" required><br><br>

        <label>Date:</label><br>
        <input type="date" name="date" required><br><br>

        <label>Customer Name:</label><br>
        <input type="text" name="customer" required><br><br>
    </fieldset>

    <fieldset>
        <legend>Detail Data (Items)</legend>

        <table border="1" cellpadding="5">
            <tr>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
            <tr>
                <td><input type="text" name="item_name[]"></td>
                <td><input type="number" name="qty[]" min="1"></td>
                <td><input type="number" name="price[]" step="0.01"></td>
            </tr>
            <tr>
                <td><input type="text" name="item_name[]"></td>
                <td><input type="number" name="qty[]" min="1"></td>
                <td><input type="number" name="price[]" step="0.01"></td>
            </tr>
            <tr>
                <td><input type="text" name="item_name[]"></td>
                <td><input type="number" name="qty[]" min="1"></td>
                <td><input type="number" name="price[]" step="0.01"></td>
            </tr>
        </table>
    </fieldset>

    <br>
    <input type="submit" value="Save">
</form>

<h4>Saved Invoice</h4>
<?php
$result = $conn->query("SELECT * FROM invoice ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
    echo "<h4>Invoice #{$row['invoice_no']} - {$row['customer']} ({$row['date']})</h4>";
    $id = $row['id'];
 
    $items = $conn->query("SELECT * FROM items WHERE invoice_id = $id");
    echo "<table border='1' cellpadding='5'><tr><th>Item</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>";
    $fulltotal = 0;
    while ($it = $items->fetch_assoc()) {
        $total = $it['qty'] * $it['price'];
        echo "<tr>
                <td>{$it['item_name']}</td>
                <td>{$it['qty']}</td>
                <td>{$it['price']}</td>
                <td>$ {$total}</td>
              </tr>";
        $fulltotal += $total;
    }
    echo "<tr><td colspan='3'><b>Total:</b></td><td><b>$ {$fulltotal}</b></td></tr>";
    echo "</table><br>";
}
$conn->close();
?>
</body>
</html>
