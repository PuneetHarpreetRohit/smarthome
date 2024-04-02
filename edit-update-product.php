<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include 'dbcon.php';

    // Get form data
    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $keywords = $_POST['keywords'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $price = $_POST['price'];

    // Update product details in the database
    $sql = "UPDATE products SET title='$title', category='$category', keywords='$keywords', description='$description', image='$image', price=$price WHERE product_id=$product_id";

    if (mysqli_query($conn, $sql)) {
        // Product details updated successfully
        echo '<script>alert("Product details updated successfully.");</script>';
        // Redirect back to manage products page
        echo '<script>window.location.href = "manage-products.php";</script>';
    } else {
        // Error updating product details
        echo '<script>alert("Error updating product details: ' . mysqli_error($conn) . '");</script>';
        // Redirect back to edit product page
        echo '<script>window.location.href = "edit_product.php?product_id=' . $product_id . '";</script>';
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect back to edit product page if form is not submitted
    echo '<script>window.location.href = "edit_product.php";</script>';
}
?>
