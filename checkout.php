<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "<script>window.location='user-login.php'</script>";
}

include_once 'dbcon.php'; // Include the database connection file
?>
     
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Checkout Page | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Checkout Page, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

    <?php include_once('header.php'); ?>

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Checkout Page</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Checkout</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Checkout Page</li>
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

    <!-- Checkout Section -->
    <section class="checkout-section section-padding cart-section">
        <div class="container">
            <div class="row clearfix">
                <!-- Form Column -->
                <div class="col-md-6 col-sm-12 col-xs-12 column form-column">
                    <div class="section-title text-left">
                        <h1><span>Your Address</span></h1>
                    </div>
                    <div class="default-form billing-info-form">
                        <form id="checkout-form" action="comfirm-order.php" method="POST">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Full Name*</label>
                                    <input type="text" name="fullname" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Email*</label>
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Phone No.*</label>
                                    <input type="text" name="phone1" class="form-control" placeholder="Phone no." required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label">Alternate Phone no.</label>
                                    <input type="text" name="phone2" class="form-control" placeholder="Alternate Phone">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Full address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label">Town / City</label>
                                    <input type="text" name="city" class="form-control" placeholder="City">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label">State</label>
                                    <input type="text" name="state" class="form-control" placeholder="State">
                                </div>
                                
                                <!-- Payment Mode -->
                                <div class="form-group col-md-12">
                                    <label class="form-label">Payment Mode</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="cash-on-delivery" name="payment_mode" value="Cash on Delivery">
                                        <label class="form-check-label" for="cash-on-delivery">Cash on Delivery</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pay-now" name="payment_mode" value="Paid">
                                        <label class="form-check-label" for="pay-now">Pay Now</label>
                                    </div>
                                </div>
                                <!-- Payment Mode -->

                                <!-- Payment Card Details -->
                                <div class="payment-details col-md-12" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">Card Number*</label>
                                        <input type="text" name="card_number" id="card-number" class="form-control" placeholder="1234567898765432">
                                        <div class="invalid-feedback">Please enter a valid card number (16 Digits).</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Expiry Date*</label>
                                        <input type="text" name="expiry_date" id="expiry-date" class="form-control" placeholder="MM/YY">
                                        <div class="invalid-feedback">Please enter a valid expiry date (09/26).</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">CVV*</label>
                                        <input type="text" name="cvv" id="cvv" class="form-control" placeholder="CVV">
                                        <div class="invalid-feedback">Please enter a valid CVV  (3 Digits).</div>
                                    </div>
                                </div>
                                <!-- Payment Card Details -->
                            </div>
                            <div class="text-end">
                                <button type="button" id="pay-now-btn" class="btn btn-primary">Pay Now</button>
                                <button type="submit" name="submit" id="place-order-btn" class="btn btn-success" style="display: none;">Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Form Column -->

                <!-- Cart Summary Column -->
                <div class="col-md-6 col-sm-12 col-xs-12 column default-column">
                    <div class="table-outer">
                        <table class="table cart-table">
                            <thead class="table-dark">
                                <tr>
                                    <th class="prod-column">PRODUCT</th>
                                    <th>QUANTITY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $res=mysqli_query($conn," SELECT * FROM cart where user_id = $user_id");
                                while($row=mysqli_fetch_array($res))
                                {
                                    $cart_id=$row[0];
                                    $p_id=$row[1];
                                    $quant=$row[3];
                                    $resw=mysqli_query($conn," SELECT * FROM products where product_id = '$p_id'");
                                    while($rows=mysqli_fetch_array($resw))
                                    {
                                        $img=$rows[4];
                                        $title=$rows[2];
                                        $imagesdata = $img ;
                                ?>
                                <tr>
                                    <td class="prod-column">
                                        <div class="column-box">
                                            <figure class="prod-thumb">
                                                <a href="#"><img style="width:70px;height:70px;"  src="<?php echo $imagesdata ;?>" alt=""></a>
                                            </figure>
                                            <h3 class="prod-title padd-top-20"><?php echo $title;?></h3>
                                        </div>
                                    </td>
                                    <td>
                                        <span style="color:black;font-size:18px;"><?php  echo $quant;?></span>
                                    </td>
                                </tr>
                                <?php 
                                        } 
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <a href="cart.php">
                                <button class="btn thm-btn thm-blue-bg">Edit Products in Your Cart</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Cart Summary Column -->
            </div>
        </div>
    </section>

    <?php include_once('footer.php'); ?>
 

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentDetails = document.querySelector('.payment-details');
        const payNowBtn = document.getElementById('pay-now-btn');
        const placeOrderBtn = document.getElementById('place-order-btn');

        // Function to show/hide payment fields and buttons based on radio button selection
        function togglePaymentFields() {
            if (document.getElementById('pay-now').checked) {
                paymentDetails.style.display = 'block';
                payNowBtn.style.display = 'block';
                placeOrderBtn.style.display = 'none'; // Hide "Place Order" button for Pay Now option
            } else {
                paymentDetails.style.display = 'none';
                payNowBtn.style.display = 'none';
                placeOrderBtn.style.display = 'block'; // Show "Place Order" button for Cash on Delivery option
            }
        }

        // Initial toggle based on radio button state
        togglePaymentFields();

        // Event listener for radio button change
        document.querySelectorAll('input[name="payment_mode"]').forEach(function(el) {
            el.addEventListener('change', togglePaymentFields);
        });

        // Form submission handler for pay now button
        payNowBtn.addEventListener('click', function () {
            // Add form validation here
            if (validatePaymentForm()) {
                // Simulate payment success
                alert('Payment successful!');
                // Show place order button after successful payment
                placeOrderBtn.style.display = 'block';
            } else {
                alert('Please fill all payment details correctly.');
            }
        });

        // Function to validate payment form
        function validatePaymentForm() {
            const cardNumber = document.getElementById('card-number').value;
            const expiryDate = document.getElementById('expiry-date').value;
            const cvv = document.getElementById('cvv').value;

            // Card Number Validation
            if (!/^\d{16}$/.test(cardNumber)) {
                document.getElementById('card-number').classList.add('is-invalid');
                return false;
            } else {
                document.getElementById('card-number').classList.remove('is-invalid');
            }

            // Expiry Date Validation
            if (!/^\d{2}\/\d{2}$/.test(expiryDate)) {
                document.getElementById('expiry-date').classList.add('is-invalid');
                return false;
            } else {
                document.getElementById('expiry-date').classList.remove('is-invalid');
            }

            // CVV Validation
            if (!/^\d{3}$/.test(cvv)) {
                document.getElementById('cvv').classList.add('is-invalid');
                return false;
            } else {
                document.getElementById('cvv').classList.remove('is-invalid');
            }

            return true;
        }
    });
</script>

</body>

</html>
