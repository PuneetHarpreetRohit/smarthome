<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <title>User Signup | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-md-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">User Signup</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">User Signup</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/login.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->




<section class="row touch">
    <div class="sectpad touch_bg">
        <div class="container">

<div class="row justify-content-center">
                <div class="col-lg-7 mt-5 mb-5">
                  
                    <div class="wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                   <h2>User Registration</h2>
        <form action="db-user-register.php" method="post">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Your Name" required>
                        <label for="firstName">First Name</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Your Name" required>
                        <label for="lastName">Last Name</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                        <label for="email">Your Email</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
                        <label for="phoneNumber">Phone No.</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Your Address here" id="address" name="address" style="height: 150px" spellcheck="false" required></textarea>
                        <label for="address">Address</label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                        <label for="state">State</label>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                        <label for="city">City</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                </div>
            </div>
        </form>
                    </div>
                </div>
            </div>

			
		
        
        </div>
    </div>
</section>


   <?php include_once('footer.php'); ?>