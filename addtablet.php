
<?php
 session_start();
 include('database.php');
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    
    $query = "insert into tablets(name,usagefor,price)
     values ('$name','$fname','$mname')";
    mysqli_query($con,$query);
    echo "<script> alert('added successfully!!!!'); window.location.href= 'tablets.php'</script>;";
 }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add student</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
<button id="bb" onclick="window.location.href='admin.php'">back</button>
<div id="container">
        <h1>Adding tablets </h1>
    <form method="POST">
    <label for="name"><b>name : </b> </label>
    <input type="text" name="name" required> <br>

    <label for="fname"><b> use for : </b> </label>
    <input type="text" name="fname" required><br>

    <label for="mname"><b> price : </b> </label>
    <input type="text" name="mname" required><br>
    <input type="submit" value="ADD">
</form> 
</body>
</html>