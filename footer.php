 <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <a href="index.php" class="d-inline-block mb-3">
                        <h1 class="text-white">Smart Home </h1>
                    </a>
                    <p class="mb-0">Elevate living with advanced automation. Explore smart solutions for lighting, security, and more. Redefine your home experience.</p>
                </div>
           
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <h5 class="text-white mb-4">Popular Link</h5>
                    <a class="btn btn-link" href="about-us.php">About Us</a>
                    <a class="btn btn-link" href="contact-us.php">Contact Us</a>
                    <a class="btn btn-link" href="blogs.php">Blogs</a>
                    <a class="btn btn-link" href="cart.php">Cart</a>
                    <a class="btn btn-link" href="index.php">Home</a>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="text-white mb-4">Our Products</h5>
                    <a href="products.php" class="btn btn-link">All Products</a>
                    
                        <?php

include_once('dbcon.php'); 
// Fetch unique categories from the products table
$category_query = "SELECT DISTINCT category FROM products LIMIT 4 ";
$category_result = mysqli_query($conn, $category_query);

// Initialize an array to store category counts
$category_counts = array();

// Loop through each category to count the number of products
while ($row = mysqli_fetch_assoc($category_result)) {
    $category = $row['category'];
    $count_query = "SELECT COUNT(*) AS count FROM products WHERE category = '$category'";
    $count_result = mysqli_query($conn, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $category_counts[$category] = $count_row['count'];
}

// Display the categories with the counts

foreach ($category_counts as $category => $count) {
    // Create a link to a category listing page, adjust the href as needed
    $category_slug = strtolower(str_replace(' ', '-', $category));
    echo " <a class='btn btn-link' href='category.php?category=$category_slug'>$category ($count) </a></li>";
}


 
?>
                </div>
				
				     <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>5-4658 Barter Street</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+14374999577</p>
                    <p><i class="fa fa-envelope me-3"></i>info@smarthome.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Smart Home Devices</a>, All Right Reserved.

                        Designed By <a class="border-bottom" href="#">Puneet, Harpreet, Rohit Team.</a> 
						
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>