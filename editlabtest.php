<?php
include('database.php');
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $query1 = "SELECT * FROM labtest WHERE id = '$id'";
    $result = mysqli_query($con, $query1);
    $row = mysqli_fetch_assoc($result);
    $name1 = $row['name'];
    $testfor1 = $row['testfor'];
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
        $testfor = $_POST['testfor'];
        $price = $_POST['price'];

        $query = "UPDATE labtest SET name = '$name', testfor = '$testfor', price = '$price' WHERE id = '$id'";
        mysqli_query($con, $query);
        echo "<script> alert('Updated successfully!'); window.location.href = 'labtests.php'</script>;";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lab Test</title>
    <link rel="stylesheet" href="admin_login.css">
</head>
<body>
<button id="bb" onclick="window.location.href='labtests.php'">Back</button>
<div id="container">
    <h1>Editing Lab Test</h1>
    <form method="POST">
        <label for="name"><b>Name: </b></label>
        <input type="text" name="name" value="<?php echo $name1; ?>" required> <br>

        <label for="testfor"><b>Test For: </b></label>
        <input type="text" name="testfor" value="<?php echo $testfor1; ?>" required><br>

        <label for="price"><b>Price: </b></label>
        <input type="text" name="price" value="<?php echo $price1; ?>" required><br>

        <input type="submit" value="UPDATE">
    </form>
</div>
</body>
</html>
