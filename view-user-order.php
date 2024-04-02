<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('location:admin-login.php');
    exit; // Stop further execution
}

include 'dbcon.php'; // Include database connection file
 
// Retrieve order ID from the URL
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details from order_details table
    $order_query = "SELECT * FROM order_details WHERE orderid = '$order_id'";
    $order_result = mysqli_query($conn, $order_query);
    $order_row = mysqli_fetch_assoc($order_result);

    // Fetch ordered products from order_items table
    $products_query = "SELECT products.*, order_items.quantity FROM products INNER JOIN order_items ON products.product_id = order_items.product_id WHERE order_items.orderid = '$order_id'";
    $products_result = mysqli_query($conn, $products_query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Products Order Details | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

    <?php include_once('admin-header.php'); ?>
</head>

<body>
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Order ID: <?php echo $order_row['orderid']; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="order-details.php">Order Details</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"> Customer Email: <?php echo $order_row['email']; ?></li>
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
        <h2 class="mb-3">View Order Details</h2>
        <?php if ($order_row) : ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Order Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Order ID:</strong> <?php echo $order_row['orderid']; ?></p>
                            <p><strong>Customer Name:</strong> <?php echo $order_row['fname']; ?></p>
                            <p><strong>Email:</strong> <?php echo $order_row['email']; ?></p>
                            <p><strong>Contact 1:</strong> <?php echo $order_row['contact1']; ?></p>
                            <p><strong>Contact 2:</strong> <?php echo $order_row['contact2']; ?></p>
                            <p><strong>Address:</strong> <?php echo $order_row['address']; ?></p>
                            <p><strong>State:</strong> <?php echo $order_row['state']; ?></p>
                            <p><strong>City:</strong> <?php echo $order_row['city']; ?></p>
                            <p><strong>Order Date:</strong> <?php echo $order_row['orderdate']; ?></p>
                            <p><strong>Status:</strong> <?php echo $order_row['status']; ?></p>
                            <!-- Display more order details as needed -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ordered Products</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <!-- Add more product details headers as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($product_row = mysqli_fetch_assoc($products_result)) : ?>
                                            <tr>
                                                <td><?php echo $product_row['product_id']; ?></td>
                                                <td><?php echo $product_row['title']; ?></td>
                                                <td><img src="<?php echo $product_row['image']; ?>" alt="<?php echo $product_row['title']; ?>" style="max-width: 100px;"></td>
                                                <td><?php echo $product_row['quantity']; ?></td>
                                                <!-- Display more product details as needed -->
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-info" role="alert">No order found with the provided ID.</div>
        <?php endif; ?>
        <a href="order-details.php" class="btn btn-primary m-3">Back to Order Details</a>
    </div>

    <?php include_once('footer.php'); ?>