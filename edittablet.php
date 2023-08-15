
<?php
include('database.php');
if(isset($_GET['editid'])){
    $id =$_GET['editid'];
        $query1 = "select*from tablets where id = '$id'";
       $result= mysqli_query($con,$query1);
       $row = mysqli_fetch_assoc($result);
       $name1 = $row['name'];
    $fname1 =  $row['usagefor'];
    $mn = $row['price'];
    }
?>

<?php
 session_start();
 include('database.php');
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
    if(isset($_GET['editid'])){
        $id =$_GET['editid'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    
    $query = "update  tablets set name = '$name',usagefor = '$fname',price='$mname' where id='$id' ";
    mysqli_query($con,$query);
    echo "<script> alert('updated successfully!!!!'); window.location.href= 'tablets.php'</script>;";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit tablets</title>
    <link rel="stylesheet" href="admin_login.css">
    
</head>
<body>
<button id="bb" onclick="window.location.href='tablets.php'">back</button>
<div id="container">
        <h1>Editing student </h1>
        
        
    <form method="POST">
   
    <label for="name"><b> Name : </b> </label>
    <input type="text" name="name" value="<?php echo $name1; ?>" required> <br>

    <label for="fname"><b>Use for : </b> </label>
    <input type="text" name="fname" value="<?php echo $fname1; ?>" required><br>

    <label for="mname"><b>price : </b> </label>
    <input type="text" name="mname" value="<?php echo $mn; ?>" required><br>

    <input type="submit" value="UPDATE">
</form>
</body>
</html>