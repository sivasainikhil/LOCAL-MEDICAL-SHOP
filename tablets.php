<?php
include('database.php');
$query = "select*from tablets";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablets.css">
    <title>Tablets Details</title>
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
    
    <h1>Available Tablets</h1>
    <div id="div1">
        <button onclick="window.location.href='addtablet.php'">+ADD</button>
    </div>
    <div id="div2">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Use For</th>
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
                $fname = $row['usagefor'];
                $mname = $row['price'];
                echo  '<tr>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                <td>' . $fname . '</td>
                <td>' . $mname . '</td>
                <td><button><a href = "edittablet.php?editid=' . $id . '">Edit/Update</a></button></td>
                <td><button><a href = "deletetablet.php?deleteid=' . $id . '">Delete</a></button></td>
                </tr>';
            }
            ?>

        </table>
        <h1>Total available tablets: <?php echo $total; ?></h1>
    </div>

</body>

</html>
