<?php
// Check if the product ID is set and valid
if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Include database connection file
    include 'dbcon.php';
    
    // Delete product from the database
    $sql = "DELETE FROM products WHERE product_id = $product_id";
    if (mysqli_query($conn, $sql)) {
        // Product deleted successfully
        echo '<script>alert("Product deleted successfully.");</script>';
    } else {
        // Error deleting product
        echo '<script>alert("Error deleting product: ' . mysqli_error($conn) . '");</script>';
    }
    
    // Close database connection
    mysqli_close($conn);
    
    // Redirect back to manage products page
    echo '<script>window.location.href = "manage-products.php";</script>';
} else {
    // Invalid product ID
    echo '<script>alert("Invalid product ID.");</script>';
    // Redirect back to manage products page
    echo '<script>window.location.href = "manage-products.php";</script>';
}
?>
