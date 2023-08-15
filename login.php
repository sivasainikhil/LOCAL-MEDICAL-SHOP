<?php
session_start();
include('database.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $query = "select * from customer where uname ='$uname'";
    $result = mysqli_query($con,$query);
    if($uname == "nik" && $pass == "nik")
    {
       echo "<script>window.location.href='admin.php'</script>";
    }
   elseif($result){
    if($result && mysqli_num_rows($result)>0)
    {
            $row =mysqli_fetch_assoc($result);
            $name = $row['uname'];

            $password = $row['pass'];
            if($uname == $name && $pass == $password)
            {
                echo "<script> window.location.href='customer.php?editid=".$uname."'</script>";
            }
            else{
                echo "<script> window.alert('invalid username or password');</script>";  
            }
        }
        echo "<script> window.alert('invalid username or password');</script>"; 
    } 
}   

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SSN Medicals</title>
    <link rel="stylesheet" href="login-styles.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login to SSN Medicals</h2>
            <form action="#" method="POST">
                <div class="input-container">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>