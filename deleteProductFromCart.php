<?php
session_start();

// Include your database connection file
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the cart_id parameter is set
    if (isset($_GET['cart_id'])) {
        // Get the cart_id value
        $cart_id = $_GET['cart_id'];

        // Delete the product from the cart
        $sql = "DELETE FROM cart WHERE id = $cart_id";

        if (mysqli_query($conn, $sql)) {
            // Product deleted successfully
            header("Location: cart.php");
            exit();
        } else {
            // Error deleting product
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Redirect to cart page if cart_id parameter is not set
        header("Location: cart.php");
        exit();
    }
} else {
    // Redirect to cart page if request method is not GET
    header("Location: cart.php");
    exit();
}

mysqli_close($conn);
?>
