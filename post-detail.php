<?php
// Include database connection file
include 'dbcon.php';

// Fetch blog post details from the database
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM blog_posts WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
    } else {
        echo "Blog post not found";
    }
} else {
    echo "Invalid request";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title><?php echo $title; ?>| Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Blogs, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-md-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight"><?php echo $title; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Blog</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $title; ?></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/blog.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
<body>
    <div class="container my-5">
        <h1><?php echo $title; ?></h1>
        <p><?php echo $content; ?></p>
        <a href="blogs.php" class="btn btn-primary">Back to Blog</a>
    </div>
    <?php include_once('footer.php'); ?>