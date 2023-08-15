<?php
session_start();

include('database.php');

// ... code to retrieve customer details ...

$medicineOptions = []; // Initialize the options arrays
$labTestOptions = [];
$productOptions = [];
$healthcareOptions = [];
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        #container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
        }

        .payment-options {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .checkout-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2>Checkout</h2>
        <div class="cart">
            <h3>Your Cart</h3>
            <table>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                </tr>
                <?php
                $totalPrice = 0;
                foreach ($cartItems as $itemId => $quantity) {
                    $item = null;

                    // Find the item in the appropriate options array based on item ID
                    foreach ($medicineOptions as $medicine) {
                        if ($medicine['id'] == $itemId) {
                            $item = $medicine;
                            break;
                        }
                    }
                    foreach ($labTestOptions as $labtest) {
                        if ($labtest['id'] == $itemId) {
                            $item = $labtest;
                            break;
                        }
                    }
                    foreach ($productOptions as $product) {
                        if ($product['id'] == $itemId) {
                            $item = $product;
                            break;
                        }
                    }
                    foreach ($healthcareOptions as $healthPackage) {
                        if ($healthPackage['id'] == $itemId) {
                            $item = $healthPackage;
                            break;
                        }
                    }

                    if ($item) {
                        $itemName = isset($item['name']) ? $item['name'] : (isset($item['name']) ? $item['name'] : '');
                        $totalItemPrice = $item['price'] * $quantity;
                        $totalPrice += $totalItemPrice;
                        ?>
                        <tr>
                            <td><?php echo $itemName; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td>$<?php echo $item['price']; ?></td>
                            <td>$<?php echo $totalItemPrice; ?></td>
                            <td>
                                <form action="#" method="POST">
                                    <input type="hidden" name="remove_from_cart" value="<?php echo $itemId; ?>">
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <p>Total Price: Rs<?php echo $totalPrice; ?></p>
        </div>

        <div class="payment-options">
            <h3>Payment Options</h3>
            <form action="payment_process.php" method="POST">
                <label for="payment_method">Select Payment Method:</label>
                <select name="payment_method" id="payment_method">
                    <option value="credit_card">Credit/Debit Card</option>
                    <option value="upi">UPI Payment</option>
                    <option value="netbanking">Netbanking</option>
                </select>
                <br>
                <button class="checkout-button" type="submit" name="checkout">Proceed to Payment</button>
            </form>
        </div>
    </div>
</body>
</html>
