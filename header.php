 
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


<!-- Top bar Start-->
  
<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="social-links d-none d-md-flex align-items-center">
      <a href="#" class="twitter"> <i class="bi bi-twitter"></i></a> 
        <a href="#" class="facebook"> <i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"> <i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"> <i class="bi bi-linkedin"></i></a>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">

      <?php




 if(!isset($_SESSION['user_id']))
 {

    
    ?>
	  <a href="#"><span><i class="fa fa-user"></i> Admin</span></a>
	  <a href="user-login.php"><span><i class="fa fa-users"></i> User</span></a>

    <?php   }
if(isset($_SESSION['user_id']))
{ 
       // User is logged in
       $user_id = $_SESSION['user_id'];
       // Retrieve user's name from the database based on user_id
       include 'functions.php';
       $user_name = getUserName($user_id); 
       // Show the user name on the top bar
       echo "<script>document.getElementById('user_name').innerText = '$user_name';</script>";
       // Show the logout button on the top bar
       echo "<script>document.getElementById('logout_button').style.display = 'block';</script>";
       
       
    
    
    ?>


<a href="#"><span><i class="fa fa-users"></i> Welcome, <?php echo $user_name; ?></span></a>

	  
    <div class="logout-btn"> <a href="logout.php"><span><i class="fas fa-sign-out-alt"></i> Logout </span></a>  </div>
    <?php   }?>
	  
        
      </div>
    </div>
  </section>
<!-- Top bar End--> 


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a href="index.php" class="navbar-brand">
                    <h1 class="text-white">Smart Home</h1>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about-us.php" class="nav-item nav-link">About Us</a>
                        <a href="blogs.php" class="nav-item nav-link">Our Blogs</a>
                        <div class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Products</a>
    <div class="dropdown-menu bg-light mt-2">
        <?php
		include_once 'dbcon.php'; // Include the database connection file
        // Fetch categories from the database
        $category_query = "SELECT DISTINCT category FROM products";
        $category_result = mysqli_query($conn, $category_query);

        // Generate URL slugs for each category and display in the menu
        while ($category_row = mysqli_fetch_assoc($category_result)) {
            $category_name = $category_row['category'];
            // Generate URL slug
            $category_slug = strtolower(str_replace(' ', '-', $category_name));
            // Output category as a dropdown item
            echo "<a href='category.php?category=$category_slug' class='dropdown-item'>$category_name</a>";
        }
 
        ?>
    </div> 
</div>

                       
                      
                     
                        <a href="#" class="nav-item nav-link">Contact Us</a>

                        <div class="shopping-cart">
						<?php
						if(isset($_SESSION['user_id'])) {
							$u_id=$_SESSION['user_id'];
							$resx=mysqli_query($conn,"SELECT * FROM cart WHERE user_id = $u_id");
							$num=mysqli_num_rows($resx);
							echo "<a class='nav-item nav-link' href='cart.php'><i class='fas fa-shopping-cart'></i> <span class='cart-item'>($num)</span> Cart</a>";
						} else {
							$num = 0; // Set the default value of num if user is not logged in
							echo "<a  class='nav-item nav-link' href='cart.php'><i class='fas fa-shopping-cart'></i> <span class='cart-item'>($num)</span> Cart</a>";
						}
						?>
					</div>

											
					<div class="nav-item dropdown">
						<?php
						if(!isset($_SESSION['user_id'])) {
							echo '<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login/Signup</a>';
							echo '<div class="dropdown-menu bg-light mt-2">';
							echo '<a href="user-login.php" class="dropdown-item">User Login</a>';
							echo '<a href="signup.php" class="dropdown-item">Signup</a>';
							echo '</div>';
						}
						?>
					</div>
 <!-- Search Icon -->
 <li class="nav-item">
                        <a href="#" class="nav-link" id="searchIcon">
                            <i class="fas fa-search"></i>
                        </a>
                    </li>

                    <!-- Search Form -->
                    <li class="nav-item" id="searchForm" style="display: none;">
                        <form action="searchpro.php" class="search-form" method="POST">
                            <div class="input-group mb-3">
                                <input type="search" name="key" class="form-control" placeholder="Enter Search keywords" aria-label="Search keywords" aria-describedby="search-icon">
                                <button class="btn btn-outline-secondary" type="submit" id="search-icon"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </li>
					</div>
                </div>
            </nav>
        </div>
    </div>
	</div>
    <!-- Navbar End -->

    
<script>
    // JavaScript to toggle search form visibility
    document.addEventListener("DOMContentLoaded", function() {
        const searchIcon = document.getElementById('searchIcon');
        const searchForm = document.getElementById('searchForm');

        searchIcon.addEventListener('click', function() {
            searchForm.style.display = 'block';
        });

        document.addEventListener('click', function(event) {
            if (!searchIcon.contains(event.target) && !searchForm.contains(event.target)) {
                searchForm.style.display = 'none';
            }
        });
    });
</script>