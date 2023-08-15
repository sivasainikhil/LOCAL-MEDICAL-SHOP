<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSN Medicals</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Placeholder styles for the image rotator container */
        .image-rotator {
            background-color: #f7f7f7;
            padding: 20px 0;
            text-align: center;
        }

        .image-rotator img {
            max-width: 100%;
            height: auto;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Beautiful script styles */
        .beautiful-script {
            font-family: 'Pacifico', cursive;
            font-size: 48px;
            color: #333;
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo.jpg" alt="SSN Medicals Logo">
        </div>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="beautiful-script">SSN MEDICALS</div>
    
    <div class="trending-bar">
        <div class="container">
            <ul>
                <li><a href="medicine.php">Medicines</a></li>
                <li><a href="labtest.php">Lab Tests</a></li>
                <li><a href="health.php">Health Care</a></li>
                
                <li><a href="product.php">Products</a></li>
                
            </ul>
        </div>
    </div>
    
    <div class="offers-bar">
        <div class="container">
            <div class="offers-scroll">
                <a href="#offers"><img src="offer1.jpg" alt="Offer 1"></a>
                <a href="#offers"><img src="offer2.jpg" alt="Offer 2"></a>
                <a href="#offers"><img src="offer3.jpg" alt="Offer 3"></a>
            </div>
        </div>
    </div>
 
    <section id="home">
        <div class="container">
            <h1>Welcome to Your Local Medical Shop</h1>
            <p>Your one-stop solution for all medical needs.</p>
        </div>
    </section>

    <!-- Container with image rotator -->
    <div class="image-rotator">
        <div class="container">
            <img src="rotator-image1.jpg" alt="Rotator Image 1">
            <img src="rotator-image2.jpg" alt="Rotator Image 2">
            <img src="rotator-image3.jpg" alt="Rotator Image 3">
        </div>
    </div>
    
    <section id="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="iframe-wrapper">
                <iframe src="contact.html" frameborder="0"></iframe>
            </div>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2023 SSN Medicals</p>
    </footer>
    
    <script src="scripts.js"></script>
</body>
</html>
