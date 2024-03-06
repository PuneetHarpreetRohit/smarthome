<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $u_id = $_SESSION['user_id'];
} else {
    echo "<script>window.location='user-login.php'</script>";
}

include_once 'dbcon.php'; // Include the database connection file
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cart page | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Cart page, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

    <?php include_once('header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Cart page</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Cart</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Cart page</li>
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

    <!-- Cart Section Start -->
    <section class="cart-section">
        <div class="container mt-5 mb-5">
            <h2 class="section-title mb-4">Your Cart</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="cart-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP loop to display cart items -->
                                <?php    
                                // Fetch cart items from the database
                                $res = mysqli_query($conn, "SELECT cart.*, products.title, products.image, products.price FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = $u_id");
                                $subtotal = 0;
                                // Loop through the cart items and display them
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $cart_id = $row['id'];
                                    $title = $row['title'];
                                    $image = $row['image'];
                                    $price = $row['price'];
                                    $quantity = $row['quantity'];
                                    $total = $price * $quantity;
                                    $subtotal += $total;
                                    ?>
									<tr>
                                        <td class="product">
                                            <img src="img/products/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="product-image">
                                            <span class="product-title"><?php echo $title; ?></span>
                                        </td>
                                        <td class="price">$<?php echo $price; ?></td>
                                        <td class="quantity">
                                            <form action="update-cart.php" method="GET">
                                                <input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">
                                                <input type="number" name="quantity" class="quantity-input" value="<?php echo $quantity; ?>">
                                                <button type="submit" class="btn btn-primary btn-update">Update</button>
                                            </form>
                                        </td>
                                        <td class="total">$<?php echo $total; ?></td>
                                        <td class="action">
                                            <a href="deleteProductFromCart.php?cart_id=<?php echo $cart_id; ?>" class="btn btn-danger btn-remove">Remove</a>
                                        </td>
                                    </tr>
                                <?php  
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-summary">
                        <h3 class="summary-title">Cart Summary</h3>
                        <div class="summary-item">
                            <span class="item-label">Subtotal:</span>
                            <span class="item-value">$<?php echo $subtotal; ?></span>
                        </div>
                        <div class="summary-item">
                            <span class="item-label">Shipping:</span>
                            <span class="item-value">Free</span>
                        </div>
                        <div class="summary-item total">
                            <span class="item-label">Total:</span>
                            <span class="item-value">$<?php echo $subtotal; ?></span>
                        </div>
                        <a href="checkout.php" class="btn btn-success btn-checkout">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('footer.php'); ?>

 
