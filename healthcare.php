<?php
include('database.php');
$query = "SELECT * FROM healthcare";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="healthcare.css">
    <title>Healthcare Details</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="logo.jpg" alt="SSN Medicals Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <!-- Add more navigation links if needed -->
            </ul>
        </nav>
    </header>
    
    <h1>Available Healthcare Products</h1>
    <div id="div1">
        <button onclick="window.location.href='addhealthcare.php'">+ADD</button>
    </div>
    <div id="div2">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Edit/Update</th>
                <th>Delete</th>
            </tr>

            <?php
            $total = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $total++;

                $id = $row['id'];
                $name = $row['name'];
                $price = $row['price'];
                echo  '<tr>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                <td>' . $price . '</td>
                <td><button><a href="edithealthcare.php?editid=' . $id . '">Edit/Update</a></button></td>
                <td><button><a href="deletehealthcare.php?deleteid=' . $id . '">Delete</a></button></td>
                </tr>';
            }
            ?>

        </table>
        <h1>Total available healthcare products: <?php echo $total; ?></h1>
    </div>

</body>

</html>
