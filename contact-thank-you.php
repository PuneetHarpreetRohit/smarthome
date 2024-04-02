<?php
session_start(); ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thank you for contacting us! | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Thank you for contacting us!, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

 <?php include_once('header.php'); ?>

 

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Thank you for contacting us!</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Thank you for contacting us!</li>
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


 

<!-- Thank you for contacting us! Section Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            // Retrieve form data from URL parameters
            $name = $_GET['name'] ?? '';
            $email = $_GET['email'] ?? '';
            $message = $_GET['message'] ?? '';

            // Display submitted data
            echo '<div class="contact-data">Contact Form Data</div>';
            echo '<div class="contact-data">Name: ' . htmlspecialchars($name) . '</div>';
            echo '<div class="contact-data">Email: ' . htmlspecialchars($email) . '</div>';
            echo '<div class="contact-data">Message: ' . htmlspecialchars($message) . '</div>';
            ?>
        </div>
        <div class="thank-you-message">Thank you for contacting us!</div>
        <div class="home-link m-5">Back to <a href="index.php">Home</a></div>
    </div>
</div>
<!-- Thank you for contacting us! Section End -->


 


 <?php include_once('footer.php'); ?>

