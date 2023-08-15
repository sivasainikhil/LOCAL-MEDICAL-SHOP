<?php
include('database.php');

// Initialize variables
$medicines = [];

// Retrieve data from the "tablets" table
$query = "SELECT * FROM tablets";
$result = mysqli_query($con, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $medicines[] = $row;
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Medicines at Our Pharmacy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        #container {
            display: grid;
            grid-template-columns: 1fr;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .navigation-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            margin: 0 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div id="container">
    <h1>Available Medicines at Our Pharmacy</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Usage For</th>
            <th>Price</th>
        </tr>
        <?php foreach ($medicines as $medicine): ?>
            <tr>
                <td><?php echo $medicine['id']; ?></td>
                <td><?php echo $medicine['name']; ?></td>
                <td><?php echo $medicine['usagefor']; ?></td>
                <td><?php echo $medicine['price']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="navigation-buttons">
        <a href="login.php" class="button">Login</a>
        <a href="signup.php" class="button">Sign Up</a>
        <a href="index.php" class="button">Home</a>
    </div>
</div>
</body>
</html>
