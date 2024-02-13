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
    <title>Smart Home Automation Device Detail | Smart Home Devices</title>
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


       <!-- Product Details -->
     <!-- Product Details -->
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <img src="img/product-image.jpg" alt="Product Image" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <h1 class="mb-4">Smart Thermostat Pro</h1>
           
            <ul class="list-group list-group-flush">
      <li class="list-group-item">Intelligent Climate Control</li>
      <li class="list-group-item">Energy Efficiency</li>
      <li class="list-group-item">Remote Access</li>
      <li class="list-group-item">Compatibility</li>
      <li class="list-group-item">Smart Integrations</li>
    </ul>
            <h5 class="text-danger p-3 my-2">Price: $199.99</h5>
            <button class="btn btn-primary me-3">Add to Cart</button>
           
        </div>
    </div>
    <p class="lead my-5">The Smart Thermostat Pro is an innovative home automation device that revolutionizes climate control. It offers advanced features and seamless integration, providing users with optimal comfort and energy efficiency.</p>
</div>


 <?php include_once('footer.php'); ?>

