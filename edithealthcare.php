<?php
include('database.php');
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $query1 = "SELECT * FROM healthcare WHERE id = '$id'";
    $result = mysqli_query($con, $query1);
    $row = mysqli_fetch_assoc($result);
    $name1 = $row['name'];
    $price1 = $row['price'];
}
?>

<?php
session_start();
include('database.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_GET['editid'])){
        $id = $_GET['editid'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $query = "UPDATE healthcare SET name = '$name', price = '$price' WHERE id = '$id'";
        mysqli_query($con, $query);
        echo "<script> alert('Updated successfully!'); window.location.href = 'healthcare.php'</script>;";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Healthcare</title>
    <link rel="stylesheet" href="admin_login.css">
</head>
<body>
<button id="bb" onclick="window.location.href='healthcare.php'">Back</button>
<div id="container">
    <h1>Editing Healthcare</h1>
    <form method="POST">
        <label for="name"><b>Name: </b></label>
        <input type="text" name="name" value="<?php echo $name1; ?>" required> <br>

        <label for="price"><b>Price: </b></label>
        <input type="text" name="price" value="<?php echo $price1; ?>" required><br>

        <input type="submit" value="UPDATE">
    </form>
</div>
</body>
</html>
