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
   <title>Edit Prodcuts | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('admin-header.php'); ?>


<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <?php
        // Check if the product ID is set and valid
        if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            
            // Include database connection file
            include 'dbcon.php';
            
            // Fetch product details from the database
            $sql = "SELECT * FROM products WHERE product_id = $product_id";
            $result = mysqli_query($conn, $sql);
            
            // Check if the product exists
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                // Display a form to edit the product details
                ?>
                <form action="edit-update-product.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="image" name="image" value="<?php echo $row['image']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
                <?php
            } else {
                // Product not found
                echo '<div class="alert alert-danger" role="alert">Product not found.</div>';
            }
            
            // Close database connection
            mysqli_close($conn);
        } else {
            // Invalid product ID
            echo '<div class="alert alert-danger" role="alert">Invalid product ID.</div>';
        }
        ?>
        <a href="admin-dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    
    


   <?php include_once('footer.php'); ?>