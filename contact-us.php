<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Us | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices Contact Us, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">
    <?php include_once('header.php'); ?>

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
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

    <?php
    // Define variables and initialize with empty values
    $name = $email = $message = "";
    $nameErr = $emailErr = $messageErr = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate name
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        // Validate email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate message
        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $message = test_input($_POST["message"]);
        }

        // If all fields are valid, process the form
        if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
            // Process your form submission here
            // For example, send an email

            // Redirect to thank you page with form data as URL parameters
           
            echo "<script>window.location.href = 'contact-thank-you.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&message=" . urlencode($message) . "';</script>";

            exit; // Exit to prevent further execution of PHP code
        }
    }

    // Function to sanitize form data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <!-- Contact Us Section Start -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-center mb-4">Get in Touch</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                            <span class="text-danger"><?php echo $nameErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                            <span class="text-danger"><?php echo $emailErr; ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required><?php echo $message; ?></textarea>
                            <span class="text-danger"><?php echo $messageErr; ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Section End -->

    <?php include_once('footer.php'); ?>
