<?php
    session_start();
    if(isset($_SESSION['user_id'])) {
        // User is logged in
        $user_id = $_SESSION['user_id'];
        // Retrieve user's name from the database based on user_id
        include 'functions.php';
        $user_name = getUserName($user_id); 
        // Show the user name on the top bar
        echo "<script>document.getElementById('user_name').innerText = '$user_name';</script>";
        // Show the logout button on the top bar
        echo "<script>document.getElementById('logout_button').style.display = 'block';</script>";
    }
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Products | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Our Products, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

 <?php include_once('header.php'); ?>

 

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Our Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Our Products</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/hero-img.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- products Section Start -->
   
    <div class="container mt-5">
    <h2 class="mb-4">Products</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="img/product-image.jpg" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Smart Thermostat Pro</h5>
                    <p class="card-text">$100.00</p>
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="detail.php" class="btn btn-outline-secondary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="img/product-image2.jpg" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">HomeGuard Security System</h5>
                    <p class="card-text">$200.00</p>
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="#" class="btn btn-outline-secondary">View Details</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="img/product-image3.jpg" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">IntelliLight Smart Bulb</h5>
                    <p class="card-text">$40.00</p>
                    <button class="btn btn-primary">Add to Cart</button>
                    <a href="#" class="btn btn-outline-secondary">View Details</a>
                </div>
            </div>
        </div>
        <!-- Add more product cards here -->
    </div>
</div>
 
 <!-- products Section End -->

 <?php include_once('footer.php'); ?>

