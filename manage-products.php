<?php
session_start();
if(!isset($_SESSION['admin']))
{
header('location:admin-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <title>Manage Products | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('admin-header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Manage Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Manage Products</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/login.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    
    <div class="container mt-5">
    <h2>Manage Products</h2>
    <?php
    include 'dbcon.php'; // Include database connection file

    // Fetch all products from the database
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    // Check if there are products
    if (mysqli_num_rows($result) > 0) {
        // Display products in a table
        echo '<div class="table-responsive">';
        echo '<table class="table table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Title</th>';
        echo '<th>Category</th>';
        echo '<th>Keywords</th>';
        echo '<th>Image</th>';
        echo '<th>Date</th>';
        echo '<th>Price</th>';
        echo '<th>Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['product_id'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . $row['category'] . '</td>';
            echo '<td>' . $row['keywords'] . '</td>';
            echo '<td><img src="' . $row['image'] . '" alt="' . $row['title'] . '" style="max-width: 100px;"></td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>$' . $row['price'] . '</td>';
            echo '<td>';
            echo '<a href="edit_product.php?product_id=' . $row['product_id'] . '" class="btn btn-primary m-1 btn-sm">Edit</a>';
            echo '<a href="delete_product.php?product_id=' . $row['product_id'] . '" class="btn btn-danger m-1 btn-sm ms-1">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        // No products found
        echo '<div class="alert alert-info" role="alert">No products found.</div>';
    }

    
    ?>
    <a href="admin-dashboard.php" class="btn btn-primary m-3">Back to Dashboard</a>
</div>


 
 
  
        



   <?php include_once('footer.php'); ?>