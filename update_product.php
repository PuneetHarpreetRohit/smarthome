<?php
session_start();
include 'dbcon.php';

// Check if product ID is provided
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Fetch existing product details from the database
    $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = $conn->query($sql);
    
    // Check if product exists
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $category = $row['category'];
        $description = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
    } else {
        // Redirect if product does not exist
        header("Location: products.php");
        exit();
    }
} else {
    // Redirect if product ID is not provided
    header("Location: products.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    // Update product details in the database
    $updateQuery = "UPDATE products SET title = '$title', category = '$category', description = '$description', price = '$price' WHERE product_id = '$product_id'";
    if ($conn->query($updateQuery) === TRUE) {
        echo "Product updated successfully.";
        // Redirect to product detail page after update
        header("Location: product_detail.php?id=$product_id");
        exit();
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <title>Admin Dashboard | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('admin-header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Admin Dashboard</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Admin Dashboard</li>
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

 


    <h2>Update Product</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>" required><br><br>
        
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" value="<?php echo $category; ?>" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea><br><br>
        
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>" required><br><br>
        
        <input type="submit" value="Update Product">
    </form>

    


<?php include_once('footer.php'); ?>