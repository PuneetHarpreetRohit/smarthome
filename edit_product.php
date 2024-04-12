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
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Edit Product</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Edit Product</li>
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
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" id="category" name="category" required>
                  
                    <option value="<?php echo $row['category']; ?>"> Already Used: <?php echo $row['category']; ?></option>
                    <?php
                    // Fetch categories from the database
                    $category_query = "SELECT DISTINCT category FROM products";
                    $category_result = mysqli_query($conn, $category_query);
                    while ($category_row = mysqli_fetch_assoc($category_result)) {
                        echo "<option>" . $category_row['category'] . "</option>";
                    }
                    ?>
                     <option value="new">Add New Category</option>
                </select>
                    </div>
                    <div class="mb-3" id="newCategoryField" style="display: none;">
                        <label for="newCategory" class="form-label">New Category:</label>
                        <input type="text" class="form-control" id="newCategory" name="newCategory">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Keywords</label>
                        <input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $row['keywords']; ?>">
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
            
            
        } else {
            // Invalid product ID
            echo '<div class="alert alert-danger" role="alert">Invalid product ID.</div>';
        }
        ?>
        <a href="admin-dashboard.php" class="btn btn-success   m-5">Back to Dashboard</a>
    </div>

    
    <script>
        document.getElementById('category').addEventListener('change', function() {
            var newCategoryField = document.getElementById('newCategoryField');
            var newCategoryInput = document.getElementById('newCategory');
            if (this.value === 'new') {
                newCategoryField.style.display = 'block';
                newCategoryInput.required = true;
            } else {
                newCategoryField.style.display = 'none';
                newCategoryInput.required = false;
            }
        });
    </script>


   <?php include_once('footer.php'); ?>