<?php
session_start();
include_once 'dbcon.php'; // Include the database connection file
require 'check_if_added.php';
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 8;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM products";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
?>
     
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Products | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Our Products, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

 <?php include_once('header.php'); ?>

 

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Our Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Our Products</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/hero-img.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- products Section Start -->

 
   
<!-- Products Section -->
<section class="products-section mt-5 mb-5">
    <div class="container">
        <h2 class="mb-4">Products</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
            <?php
            $sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $id = $row['product_id'];
                $pic = $row['image'];
                $price = $row['price'];
                $image = "img/products/" . $pic;
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
                                    <a href="product-detail?id=<?php echo $id; ?>" class="btn btn-outline-secondary">View Details</a>
                                <?php } else {
                                    if (check_if_added_to_cart($id, $conn)) { ?>
                                        <a href="#" class="btn btn-danger disabled"><i class="fas fa-shopping-cart"></i> Added to Cart</a>
                                    <?php } else { ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="idpro" value="<?php echo $id; ?>">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                                        </form>
                                        <a href="product-detail?id=<?php echo $id; ?>" class="btn btn-outline-secondary">View Details</a>
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
                                  echo"<script> alert('Product Added To Your Cart...!!!');</script>"; 
                               
                                 }
                            else{
                                   echo"<script> alert('Sorry Please Try Again...');</script>";
                                 
                                }
				
                         } 
                          echo "<meta http-equiv='refresh' content='0'>";
                         
                         } }?>
  



<ul class="post-pagination list-inline d-flex justify-content-center">
    <li class="list-inline-item"><a class="page-link" href="?pageno=1">First</a></li>
    <li class="list-inline-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-caret-left"></i></a>
    </li>
    <?php for ($x = 1; $x <= $total_pages; $x++) : ?>
        <li class="list-inline-item <?php if($pageno == $x) echo 'active'; ?>"><a class="page-link" href="?pageno=<?php echo $x; ?>"><?php echo $x; ?></a></li>
    <?php endfor; ?>
    <li class="list-inline-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><i class="fa fa-caret-right"></i></a>
    </li>
    <li class="list-inline-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>


 <!-- Scripts -->
 
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

 
 <!-- products Section End -->

 <?php include_once('footer.php'); ?>
<?php
$conn->close(); // Close the connection after using it
?>
