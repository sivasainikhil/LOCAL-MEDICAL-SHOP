<?php

session_start();
include('database.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $sql = "INSERT INTO customer (fname,lname,uname,pass,city,stat,coun,phn,main,gender)
            VALUES ('$firstname', '$lastname', '$username', '$password', '$city', '$state', '$country', '$phone', '$email', '$gender')";
 mysqli_query($con,$sql);
   echo "<script> window.alert('added successfully');window.location.href= 'index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - SSN Medicals</title>
    <link rel="stylesheet" href="signup-styles.css">
    <script src="signup-validation.js"></script>
</head>
<body>
    <div class="signup-container">
        <div class="signup-box">
            <h2>Signup for SSN Medicals</h2>
            <div class="scrolling-content">
                <form id="signup-form" action="#" method="POST">
                    <div class="input-container">
                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
                    </div>
                    <div class="input-container">
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
                    </div>
                    <div class="input-container">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Choose a username" required>
                    </div>
                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter a password" required>
                    </div>
                    <div class="input-container">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                    </div>
                    <div class="input-container">
                        <label for="city">City/Town/Village</label>
                        <input type="text" id="city" name="city" placeholder="Enter your city/town/village" required>
                    </div>
                    <div class="input-container">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" placeholder="Enter your state" required>
                    </div>
                    <div class="input-container">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" placeholder="Enter your country" required>
                    </div>
                    <div class="input-container">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="input-container">
                        <label for="email">Email ID</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    </div>
                    <div class="input-container">
                        <label>Gender</label>
                        <div class="gender-options">
                            <label><input type="radio" name="gender" value="male" required> Male</label>
                            <label><input type="radio" name="gender" value="female" required> Female</label>
                            <label><input type="radio" name="gender" value="other" required> Other</label>
                        </div>
                    </div>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
