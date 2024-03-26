<?php
session_start();
require 'check_if_added.php';
include_once 'dbcon.php';

// Check if category slug is set in the URL
if(isset($_GET['category'])) {
    // Retrieve category slug from the URL
    $category_slug = $_GET['category'];

    // Fetch category name based on the provided slug
    $category_query = "SELECT category FROM products WHERE LOWER(REPLACE(category, ' ', '-')) = '$category_slug'";
    $category_result = mysqli_query($conn, $category_query);
    $category_row = mysqli_fetch_assoc($category_result);
    $category_name = $category_row['category'];

    // Fetch products belonging to the selected category
    $products_query = "SELECT * FROM products WHERE LOWER(REPLACE(category, ' ', '-')) = '$category_slug'";
    $products_result = mysqli_query($conn, $products_query);
} else {
    // If category slug is not set, redirect to homepage or display an error message
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $category_name; ?> | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices <?php echo $category_name; ?>, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

    <?php include_once('header.php'); ?>

</head>

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight"><?php echo $category_name; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Products</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $category_name; ?></li>
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

<body>

    <!-- Add your HTML content here to display products based on the selected category -->
    <div class="container mt-5">
        <h2 class="mb-4">Products in <?php echo $category_name; ?></h2>
        <div class="row">
            <?php
            // Check if products are available for the selected category
            if(mysqli_num_rows($products_result) > 0) {
                // Loop through each product and display its details
                while ($row = mysqli_fetch_assoc($products_result)) {
                    $title = $row['title'];
                    $id = $row['product_id'];
                    $img = $row['image'];
                    $description = $row['description'];
                    $date = $row['date'];
                    $price = $row['price'];
                    $image =  $img;
            ?>
                    <!-- Product Card -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $image; ?>" class="card-img-top" alt="<?php echo $title; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>
                                <p class="card-text">Price: $<?php echo $price; ?></p>
                                <div class="d-flex justify-content-between">
                                <?php if (!isset($_SESSION['user_id'])) { ?>
                                    <a href="user-login.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    <a href="product-detail?id=<?php echo $id; ?>" class="btn btn-outline-secondary">View Details</a>
                                <?php } else {
                                    if (check_if_added_to_cart($id, $conn)) { ?>
                                        <a href="#" class="btn btn-danger disabled"><i class="fas fa-shopping-cart"></i> Added to Cart</a>
                                    <?php } else { ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="idpro" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        <a href="product-detail?id=<?php echo $id; ?>" class="btn btn-outline-secondary">View Details</a>
                                <?php }
                                } ?>
                            </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else { ?>
                 <!-- Display a message if no products are found for the selected category -->
                <div class="col">
                <div class="card mb-4 product-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">No products found</h5>
                            <p class="card-text">Sorry, >No products found in this category.</p>
                        </div>
                    </div>
                </div>
            </div>
              
           <?php }
            ?>
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


