<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <title>Our Blogs | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-md-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Our Blogs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Our Blogs</li>
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
    <div class="container">
        <h1 class="my-5">Blog</h1>
        <div class="row">
            <?php
            // Include database connection file
            include_once 'dbcon.php';
            
            // Fetch blog posts from the database
            $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
            $result = $conn->query($sql);
            
            // Display each blog post as a card
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                <p class="card-text"><?php echo substr($row['content'], 0, 100); ?>...</p>
                                <a href="post-detail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No blog posts found";
            }
            ?>
        </div>
    </div>



<?php include_once('footer.php'); ?>



