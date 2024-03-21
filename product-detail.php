<?php
session_start();
include 'dbcon.php'; // Include the database connection file
$product_id = $_GET['id'];
require 'check_if_added.php';
    ?>


<?php

$sql = "SELECT * FROM products WHERE product_id =$product_id ";
$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);
$product_id = $row['product_id'];
$title= $row['title'];
$descripton= $row['descripton'];
$pic= $row['image'];
$category_name1 =$row['category'];
$price= $row['price'];
$image = "img/products/".$pic;
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

    <!-- Main Content with Sidebar -->
    <div class="container my-5">
        <div class="row">
           <!-- Sidebar -->
           <div class="col-lg-3 col-md-3 col-xs-12">
    <h2>Sidebar</h2>
    <div class="custom-sidebar-wrapper">
        <div class="custom-search-widget">
            <h3>Search Keywords</h3>
            <form action="searchpro.php" class="search-form" method="POST">
                <div class="input-group mb-3">
                    <input type="search" name="key" class="form-control" placeholder="Enter Search keywords" aria-label="Search keywords" aria-describedby="search-icon">
                    <button class="btn btn-outline-secondary" type="submit" id="search-icon"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="custom-category-widget">
            <h3>Categories</h3>
            <ul>
            <li><a href="office-desk.php">Office Desk <span>(<?php 
                     $qry="select count(*) as total3 from products where category='Office Desk'";
                     $res= mysqli_query($conn, $qry);  while($row= mysqli_fetch_array($res))   
                     {    echo $row['total3']; }?>)</span></a></li>
                <li><a href="home-automation.php">Home Automation<span>(<?php 
                     $qry="select count(*) as total1 from products where category='Home Automation'";
                     $res= mysqli_query($conn, $qry);  while($row= mysqli_fetch_array($res))   
                     {    echo $row['total1']; }?>)</span></a></li> 
                <li><a href="alarm-system.php">Alarm System<span>(<?php 
                     $qry="select count(*) as total2 from products where category='Alarm System'";
                     $res= mysqli_query($conn, $qry);  while($row= mysqli_fetch_array($res))   
                     {    echo $row['total2']; }?>)</span></a></li> 
                <li><a href="automation-device.php">Automation Device <span>(<?php 
                     $qry="select count(*) as total3 from products where category='Automation Device' ";
                     $res= mysqli_query($conn, $qry);  while($row= mysqli_fetch_array($res))   
                     {    echo $row['total3']; }?>)</span></a></li>
            </ul>
        </div>
    </div>
</div>

   <!-- Sidebar end-->


                
            
            <!-- Product Details -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?php echo $image;?>" alt="<?php echo $title; ?>" class="img-fluid">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4"><?php echo $title; ?></h1>
                        <h5 class="text-danger p-3 my-2">Price: $<?php echo $price; ?></h5>
                      
                        <div class="d-flex justify-content-between">
                                <?php if (!isset($_SESSION['user_id'])) { ?>
                                    <a href="user-login.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                  
                                <?php } else {
                                    if (check_if_added_to_cart($product_id, $conn)) { ?>
                                        <a href="#" class="btn btn-danger disabled"><i class="fas fa-shopping-cart"></i> Added to Cart</a>
                                    <?php } else { ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="idpro" value="<?php echo $product_id; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        
                                <?php }
                                } ?>
                            </div>
                    </div>
                </div>
                <p class="lead my-5"><?php echo $descripton; ?></p>
            </div>
             <!-- Product Details end -->
        </div>
        </div> <!-- Main Content with Sidebar end -->
      





<div class="container">
    <h2 class="mt-5 mb-4">Related Products</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
        <?php
        // Query to fetch related products based on the current category
        $related_products_query = "SELECT * FROM products WHERE category = '$category_name1' LIMIT 6";
        $related_products_result = mysqli_query($conn, $related_products_query);
        while ($row = mysqli_fetch_assoc($related_products_result)) {
            $related_title = $row['title'];
            $related_image = "img/products/" . $row['image'];
            $related_price = $row['price'];
            $related_product_id = $row['product_id'];
            ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo $related_image; ?>" class="card-img-top" alt="<?php echo $related_title; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $related_title; ?></h5>
                        <p class="card-text">Price: $<?php echo $related_price; ?></p>
                        <div class="d-flex justify-content-between">
                                <?php if (!isset($_SESSION['user_id'])) { ?>
                                    <a href="user-login.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    <a href="product-detail?id=<?php echo $related_product_id; ?>" class="btn btn-outline-secondary">View Details</a>
                                <?php } else {
                                    if (check_if_added_to_cart($related_product_id, $conn)) { ?>
                                        <a href="#" class="btn btn-danger disabled"><i class="fas fa-shopping-cart"></i> Added to Cart</a>
                                    <?php } else { ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="idpro" value="<?php echo $related_product_id; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        <a href="product-detail?id=<?php echo $related_product_id; ?>" class="btn btn-outline-secondary">View Details</a>
                                <?php }
                                } ?>
                            </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php
if(isset($_SESSION['user_id'])) {   


$user_id=$_SESSION['user_id'];
include_once 'dbcon.php'; // Include the database connection file
 

if(isset($_POST["idpro"])) {
                	$pro_id = $_POST['idpro'];
                	
                 
                
                  $ress=mysqli_query($conn," SELECT * FROM cart where user_id='$user_id' AND product_id='$pro_id'");
                       if(mysqli_num_rows($ress)>0){
                                    echo"<script> alert('Product Already Added...');</script>";
                                
                       }
                       else{
                                        
		                 $qry="insert into cart values(null,'$pro_id','$user_id',1)"; 
                         $res=mysqli_query($conn,$qry);
                       if($res){ 
                                  //echo"<script> alert('Product Added To Your Cart...!!!');</script>"; 
                               
                                 }
                            else{
                                   echo"<script> alert('Sorry Please Try Again...');</script>";
                                 
                                }
				
                         } 
                          echo "<meta http-equiv='refresh' content='0'>";
                         
                         } }?>

 <?php include_once('footer.php'); ?>

