<?php
session_start();
require 'check_if_added.php';
$name = "Searched Products";
include_once 'dbcon.php';
$datakey = $_POST["key"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $name; ?> | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices <?php echo $name; ?>, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

    <?php include_once('header.php'); ?>

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Searched by "<?php echo $datakey; ?>"</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Search</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $name; ?></li>
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

    <!-- products Search Section Start -->
    <section class="products-section mt-5 mb-5">
        <div class="container">
            <h2 class="mb-4">Products</h2>
            <div class="row">
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

                <!-- Display search results -->
                <div class="col-lg-9 col-md-9 col-xs-12">
                    <div class="row">
                        <?php
                        // Check if the search key is set and not empty
                        if (isset($_POST["key"]) && !empty($_POST["key"])) {
                            $key = mysqli_real_escape_string($conn, $_POST["key"]);
                            $sql = "SELECT * FROM products WHERE keywords LIKE '%$key%'";
                            $result = mysqli_query($conn, $sql);

                            // Check if there are any search results
                            if ($result && mysqli_num_rows($result) > 0) {
                                // Fetch all search results and store them in the $search_results array
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $title = $row['title'];
                                    $id = $row['product_id'];
                                    $img = $row['image'];
                                    $descripton = $row['descripton'];
                                    $date = $row['date'];
                                    $price = $row['price'];
                                    $image = "img/products/" . $img;
                        ?>
                                    <div class="col">
                                        <div class="card mb-4 product-card">
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
                                                            <a href="product-detail?id=<?php echo $id; ?>" class="btn btn-outline-secondary">View Details</a>
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php }
                            } else { ?>
                                <!-- No search results found -->
                                <div class="col">
                                    <div class="card mb-4 product-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">No products found</h5>
                                                <p class="card-text">Sorry, no products were found for the given search query.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once('footer.php'); ?>