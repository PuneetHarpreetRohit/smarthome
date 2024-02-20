<?php
session_start();
include 'dbcon.php'; // Include the database connection file
$product_id = $_GET['id'];
    ?>


<?php

$sql = "SELECT * FROM products WHERE product_id =$product_id ";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);
$product_id = $row['product_id'];
$title= $row['title'];
$descripton= $row['descripton'];
$pic= $row['image'];
$price= $row['price'];
$image = "img/".$pic;
?>


    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?> | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Our Products, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

 <?php include_once('header.php'); ?>

 

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight"><?php echo $title; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="products.php">Our Products</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $title; ?></li>
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
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <img src="<?php echo $image;?>" alt="<?php echo $title; ?>" class="img-fluid">
        </div>
        <div class="col-lg-6">
            <h1 class="mb-4"><?php echo $title; ?></h1>
           
           
            <h5 class="text-danger p-3 my-2">Price: $<?php echo $price; ?></h5>
            <button class="btn btn-primary me-3">Add to Cart</button>
           
        </div>
    </div>
    <p class="lead my-5"><?php echo $descripton; ?></p>
</div>


 <?php include_once('footer.php'); ?>

