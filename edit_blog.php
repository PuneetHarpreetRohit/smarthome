<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('location:admin-login.php');
    exit; // Stop further execution
}

include 'dbcon.php'; // Include database connection file

// Check if the ID parameter is provided in the URL
if(isset($_GET['id'])) {
    $blog_id = $_GET['id'];

    // Fetch the blog post from the database based on the provided ID
    $sql = "SELECT * FROM blog_posts WHERE id = $blog_id";
    $result = mysqli_query($conn, $sql);

    // Check if the blog post exists
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display the form to edit the blog post
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog Management | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">
    <?php include_once('admin-header.php'); ?>
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Blog Management</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Blog Management</li>
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
</head>
<body>
 
    <div class="container mt-5">
        <h2>Edit Blog Post</h2>
         <form action="db-update-blog.php" method="post">
            <input type="hidden" name="blog_id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="5"><?php echo $row['content']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-5 mb-5">Save Changes</button>
        </form>
    
        <?php
    } else {
        echo "Blog post not found.";
    }
} else {
    echo "Blog post ID is missing.";
}
?>

<a href="admin-dashboard.php" class="btn btn-primary m-3">Back to Dashboard</a>
    </div>
    <?php include_once('footer.php'); ?>
 