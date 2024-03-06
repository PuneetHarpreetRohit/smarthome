<?php
session_start();
// Include database connection
include_once 'dbcon.php';
if (!isset($_GET['order_id'])) {
    echo "<h2>Order ID is missing!</h2>";
    exit();
}

// Check if the database connection is established
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order_id = $_GET['order_id'];

// Fetch order details from the database
$query = "SELECT * FROM order_details WHERE orderid = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    echo "<h2>Error: Failed to prepare the query.</h2>";
    echo "<p>Error: " . $conn->error . "</p>"; // Print the specific error message
    exit(); // Exit the script to prevent further execution
}

// Bind parameters
$stmt->bind_param("s", $order_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Fetch and display order details
    $order = $result->fetch_assoc();
} else {
    echo "<p>No orders found with the specified order ID.</p>";
}

// Fetch order items from the database
$query = "SELECT products.title, products.image, order_items.quantity FROM order_items JOIN products ON order_items.product_id = products.product_id WHERE order_items.orderid = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo "<h2>Error: Failed to prepare the query.</h2>";
    exit();
}

$stmt->bind_param("s", $order_id);
$result = $stmt->execute();
if (!$result) {
    echo "<h2>Error: Failed to execute the query.</h2>";
    exit();
}

$result = $stmt->get_result();
$order_items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thank You | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Thank You, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

    <?php include_once('header.php'); ?>

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Thank You</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Checkout</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Thank You</li>
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

    <div class="container mt-5">
        <div class="row">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <h2 class="mb-4">Thank You for Your Order!</h2>
                <h3>Your Order ID: <?php echo $order_id; ?></h3>
                 
   
        <?php foreach ($order_items as $item) : ?>
            <div class="col">
                <div class="card">
                    <img  src="img/products/<?php echo $item['image']; ?>" class="card-img-top resize-thanks" alt="<?php echo $item['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['title']; ?></h5>
                        <p class="card-text">Quantity: <?php echo $item['quantity']; ?></p>
                    </div>
                     
                </div>
            </div>
        <?php endforeach; ?>
   
 
                
                <h4>Shipping Address:</h4>
                <p><strong>Name:</strong> <?php echo $order['fname']; ?></p>
                <p><strong>Email:</strong> <?php echo $order['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $order['contact1'] . ', ' . $order['contact2']; ?></p>
                <p><strong>Address:</strong> <?php echo $order['address'] . ', ' . $order['city'] . ', ' . $order['state']; ?></p>
            </div>
            <div class="col-lg-4 d-flex justify-content-between">
    <!-- Print button -->
    <button class="btn btn-primary mb-3" onclick="window.print()">Print Order</button>
    <!-- Continue to homepage button -->
    <a href="index.php" class="btn btn-success  mb-3">Continue Shopping</a>
</div>

        </div>
    </div>
    
    <?php include_once('footer.php'); ?>
 

