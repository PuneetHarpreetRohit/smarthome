<?php
session_start();
if(!isset($_SESSION['admin']))
{
header('location:admin-login.php');
}
include_once('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <title>Upload Product | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('admin-header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Upload Product</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Upload Product</li>
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





    <!-- Upload Product Start -->
    <div class="container mt-3">
        <h2>Upload Product</h2>
        <form action="product-upload-process.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" id="category" name="category" required>
                    <option selected disabled>Select Category</option>
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
                <label for="keywords" class="form-label">Keywords:</label>
                <input type="text" class="form-control"placeholder="For example: Smart,Bulb" id="keywords" name="keywords" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Product</button>
        </form>
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