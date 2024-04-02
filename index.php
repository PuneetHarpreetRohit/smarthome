<?php
session_start();
include 'dbcon.php'; // Include database connection file

require 'check_if_added.php';
 
 
?>
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

 <?php include_once('header.php'); ?>


    <!-- Home banner Start -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">Smart Home Devices</div>
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Welcome to the Future of Smart Living!</h1>
                    <p class="text-white mb-4 animated slideInRight">Transform your home with cutting-edge automation. Explore our range of smart devices designed for comfort, security, and energy efficiency.</p>
                    <a href="#" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">Read More</a>
                    <a href="#" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/home-banner.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Home banner End -->


    <!-- About us Section Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/about-img.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                    <h1 class="mb-4">Making Your Home Smarter with Artificial Intelligence</h1>
                    <p class="mb-4">Welcome to Smart Home Devices, where we make your home smarter with artificial intelligence. At Smart Home Devices, 
					we believe in creating homes that effortlessly blend cutting-edge technology with everyday living. Our passion for smart home devices 
					stems from a vision to redefine the way you experience and interact with your living spaces.</p>
                    <p class="mb-4">We pride ourselves on staying at the forefront of technological advancements. 
					Our curated collection features the latest innovations in smart lighting, security, climate control, and more.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About us Section End -->
 
  <!-- About us Section Start -->
  <div class="container-fluid py-5">
        <div class="container">
        <h2 class="mb-4">Our Blogs</h2>
<?php
// Fetch all blog posts from the database
$sql = "SELECT * FROM blog_posts LIMIT 4";
$result = mysqli_query($conn, $sql);

// Check if there are blog posts
if(mysqli_num_rows($result) > 0) {
    echo '<div class="row">';
    // Display blog posts
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-3 mb-4">';
        echo '<div class="card h-100 border rounded shadow-sm">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['title'] . '</h5>';
        echo '<p class="card-text">' . $row['created_at'] . '</p>';
        echo '<a href="post-detail.php?id=' . $row['id'] . '" class="btn btn-primary">View Detail</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    // No blog posts found
    echo '<div class="alert alert-info" role="alert">No blog posts found.</div>';
}

 
?>
</div>
        </div>





<!-- Products Section -->
<section class="products-section mt-5 mb-5">
    <div class="container">
        <h2 class="mb-4">Products</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
            <?php
            $sql = "SELECT * FROM products LIMIT 4";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $id = $row['product_id'];
                $pic = $row['image'];
                $price = $row['price'];
                $image = $pic;
            ?>
                <div class="col">
                    <div class="card mb-4 product-card">
                        <img src="<?php echo $image; ?>" class="card-img-top" alt="<?php echo $title; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <p class="card-text">Price: $<?php echo $price; ?></p>
                            <div class="d-flex justify-content-between">
                                <?php if (!isset($_SESSION['user_id'])) { ?>
                                    <a href="user-login.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    <a href="product-detail.php?id=<?php echo $id; ?>" class="btn btn-outline-secondary">View Details</a>
                                <?php } else {
                                    if (check_if_added_to_cart($id, $conn)) { ?>
                                        <a href="#" class="btn btn-danger disabled"><i class="fas fa-shopping-cart"></i> Added to Cart</a>
                                    <?php } else { ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="idpro" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        <a href="product-detail.php?id=<?php echo $id; ?>" class="btn btn-outline-secondary">View Details</a>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


            <?php
            if(isset($_SESSION['user_id'])) {   


            $user_id=$_SESSION['user_id'];
            include_once 'dbcon.php'; // Include the database connection file


            if(isset($_POST["idpro"])) {
            $pro_id = $_POST['idpro'];



            $ress=mysqli_query($conn," SELECT * FROM cart where user_id='$user_id' AND product_id='$pro_id'");
            if(mysqli_num_rows($ress)>0){
                echo"<script> alert('Product Already Added...');</script>";

            }
            else{
                    
            $qry="insert into cart values(null,'$pro_id','$user_id',1)"; 
            $res=mysqli_query($conn,$qry);
            if($res){ 
                

                }
            else{
                echo"<script> alert('Sorry Please Try Again...');</script>";
                
            }

            } 
            echo "<meta http-equiv='refresh' content='0'>";

            } }?>

        <script>
            // JavaScript code to set equal height for product cards in each row
            document.addEventListener("DOMContentLoaded", function() {
                const rows = document.querySelectorAll('.products-section .row');
                rows.forEach(row => {
                    let maxHeight = 0;
                    row.querySelectorAll('.product-card').forEach(card => {
                        const cardHeight = card.offsetHeight;
                        if (cardHeight > maxHeight) {
                            maxHeight = cardHeight;
                        }
                    });
                    row.querySelectorAll('.product-card').forEach(card => {
                        card.style.height = `${maxHeight}px`;
                    });
                });
            });
        </script>


 <?php include_once('footer.php'); ?>

