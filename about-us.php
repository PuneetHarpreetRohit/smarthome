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
    <title>About US | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices About US, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

 <?php include_once('header.php'); ?>

 

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>
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


    <!-- About us Section Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/about-img.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                    <h1 class="mb-4">Making Your Home Smarter with Artificial Intelligence</h1>
                    <p class="mb-4">Welcome to Smart Home Devices, where we make your home smarter with artificial intelligence. At Smart Home Devices, 
					we believe in creating homes that effortlessly blend cutting-edge technology with everyday living. Our passion for smart home devices 
					stems from a vision to redefine the way you experience and interact with your living spaces.</p>
                    <p class="mb-4">We pride ourselves on staying at the forefront of technological advancements. 
					Our curated collection features the latest innovations in smart lighting, security, climate control, and more.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About us Section End -->

 


 <?php include_once('footer.php'); ?>

