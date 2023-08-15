<?php
 session_start();
 include('database.php');
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    $query = "INSERT INTO products (name, price)
              VALUES ('$name', '$price')";
    mysqli_query($con, $query);
    echo "<script> alert('Added successfully!'); window.location.href= 'products.php'</script>;";
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
<button id="bb" onclick="window.location.href='admin.php'">Back</button>
<div id="container">
    <h1>Adding Product</h1>
    <form method="POST">
        <label for="name"><b>Name: </b></label>
        <input type="text" name="name" required> <br>

        <label for="price"><b>Price: </b></label>
        <input type="text" name="price" required><br>

        <input type="submit" value="ADD">
    </form>
</div>
</body>
</html>
