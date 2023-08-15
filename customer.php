<?php
session_start();

include('database.php');

if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
    $query1 = "SELECT * FROM customer WHERE uname = '$id'";
    $result = mysqli_query($con, $query1);
    $row = mysqli_fetch_assoc($result);

    $i = $row['id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $mname = $row['uname'];
    $ads = $row['city'];
    $c = $row['stat'];
    $co = $row['coun'];
    $ph = $row['phn'];
    $m = $row['main'];
    $g = $row['gender'];
}


$cart = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_POST["add_to_cart"])) {
        $itemId = $_POST["item_id"];
        $quantity = $_POST["quantity"];

        if ($quantity > 0) {
            if (isset($_SESSION['cart'][$itemId])) {
                $_SESSION['cart'][$itemId] += $quantity;
            } else {
                $_SESSION['cart'][$itemId] = $quantity;
            }
        }
    } elseif (isset($_POST["remove_from_cart"])) {
        $removeId = $_POST["remove_from_cart"];
        unset($_SESSION['cart'][$removeId]);
    }
}


$medicineOptions = [];
$labTestOptions = [];
$productOptions = [];
$healthcareOptions = [];

$sqlMedicine = "SELECT id, name, usagefor, price FROM tablets";
$resultMedicine = $con->query($sqlMedicine);
if ($resultMedicine->num_rows > 0) {
    while ($row = $resultMedicine->fetch_assoc()) {
        $medicineOptions[] = $row;
    }
}

$sqlLabTest = "SELECT id, name, testfor, price FROM labtest";
$resultLabTest = $con->query($sqlLabTest);
if ($resultLabTest->num_rows > 0) {
    while ($row = $resultLabTest->fetch_assoc()) {
        $labTestOptions[] = $row;
    }
}

$sqlProduct = "SELECT id, name, price FROM products";
$resultProduct = $con->query($sqlProduct);
if ($resultProduct->num_rows > 0) {
    while ($row = $resultProduct->fetch_assoc()) {
        $productOptions[] = $row;
    }
}

$sqlHealthcare = "SELECT id, name , price FROM healthcare";
$resultHealthcare = $con->query($sqlHealthcare);
if ($resultHealthcare->num_rows > 0) {
    while ($row = $resultHealthcare->fetch_assoc()) {
        $healthcareOptions[] = $row;
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
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

.shopping-container {
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #fff;
    border-radius: 8px;
}

.medicine-box {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
}

.medicine-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart {
    border: 1px solid #ddd;
    padding: 20px;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 8px;
}

.checkout-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    cursor: pointer;
}

/* Additional styling for the cart table */
.cart table {
    width: 100%;
    border-collapse: collapse;
}

.cart th, .cart td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

/* Styling for the quantities in the cart */
.cart input[type="number"] {
    width: 50px;
    padding: 3px;
    text-align: center;
}

/* Styling for the Remove button in the cart */
.cart form button[type="submit"] {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
}


        /* Additional styling for the details table */
        #div2 table {
            width: 100%;
            border-collapse: collapse;
        }

        #div2 th, #div2 td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        /* Styling for the Add to Cart button in the details table */
        #div2 form button[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div id="container">
        <h1 >Welcome to SSN medicals </h1>
        
 <table>
    <tr>
        <td> ID : </td>
        <td><?php echo$i;       ?></td>
    </tr>
    <tr>
        <td>First Name :</td>
        <td><?php echo$fname;       ?></td>
    </tr>
    <tr>
        <td>Last name :</td>
        <td><?php echo$lname;       ?></td>
    </tr>
    <tr>
        <td>user name :</td>
        <td><?php echo$mname;       ?></td>
    </tr>
    <tr>
        <td>City :</td>
        <td><?php echo$ads;       ?></td>
    </tr>
    <tr>
        <td>State:</td>
        <td><?php echo$c;       ?></td>
    </tr>
    <tr>
        <td>Country:</td>
        <td><?php echo$co;      ?></td>
    </tr>
    <tr>
        <td>Phone number :</td>
        <td><?php echo$ph;       ?></td>
    </tr>
    <tr>
        <td>Mail id :</td>
        <td><?php echo$m;       ?></td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td><?php echo$g;       ?></td>
    </tr>
   </div>

</div>



<div class="shopping-container">
    <h2>YOUR PERSONAL DETAILS</h2>
    <div id="div2">
        <table>
            <tr>
                <th>ID</th>
                <th>medicine Name</th>
                <th>Use for</th>
                <th>Price</th>
                <th>Add to cart</th>
            </tr>
            <?php
            foreach ($medicineOptions as $medicine) {
                $id = $medicine['id'];
                $name = $medicine['name'];
                $usagefor = $medicine['usagefor'];
                $price = $medicine['price'];
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $usagefor; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <form action="#" method="POST">
                            <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" name="add_to_cart">Add to Cart</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

<!-- ... previous code ... -->

<div class="content" id="labtests">
    <table>
        <tr>
            <th>ID</th>
            <th>Test Name</th>
            <th>Test For</th>
            <th>Price (Rs)</th>
            <th>Add to cart</th>
        </tr>
        <?php
        foreach ($labTestOptions as $labtest) {
            $id = $labtest['id'];
            $testName = $labtest['name'];
            $testFor = $labtest['testfor'];
            $price = $labtest['price'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $testName; ?></td>
                <td><?php echo $testFor; ?></td>
                <td><?php echo $price; ?></td>
                <td>
                    <form action="#" method="POST">
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div class="content" id="products">
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price (Rs)</th>
            <th>Add to cart</th>
        </tr>
        <?php
        foreach ($productOptions as $product) {
            $id = $product['id'];
            $productName = $product['name'];
            $price = $product['price'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $productName; ?></td>
                <td><?php echo $price; ?></td>
                <td>
                    <form action="#" method="POST">
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div class="content" id="healthpackages">
    <table>
        <tr>
            <th>ID</th>
            <th>Package Name</th>
            <th>Price (Rs)</th>
            <th>Add to cart</th>
        </tr>
        <?php
        foreach ($healthcareOptions as $healthPackage) {
            $id = $healthPackage['id'];
            $packageName = $healthPackage['name'];
            $price = $healthPackage['price'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $packageName; ?></td>
                <td><?php echo $price; ?></td>
                <td>
                    <form action="#" method="POST">
                        <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                        <input type="number" name="quantity" value="1" min="1">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>


<div class="cart">
    <h2>Your Cart</h2>
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
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $itemId => $quantity) {
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
                $totalItemPrice = $item['price'] * $quantity;
                $totalPrice += $totalItemPrice;
                ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>Rs<?php echo $item['price']; ?></td>
                    <td>Rs<?php echo $totalItemPrice; ?></td>
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
    }
        ?>
    </table>
    <p>Total Price: Rs<?php echo $totalPrice; ?></p>
    <form action="checkout.php" method="POST"> <!-- Change the action URL to your checkout page -->
        <button class="checkout-button" type="submit" name="checkout">Checkout</button>
    </form>
</div>

</div>
<div class="navigation-buttons">
        <a href="index.php" class="button">Home</a>
    </div>

</body>
</html>