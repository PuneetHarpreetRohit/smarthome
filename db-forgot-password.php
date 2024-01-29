<?php
// Include your database connection file (dbcon.php)
include_once('dbcon.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email from the form
    $email = $_POST['email'];

    // Validate and sanitize the email (you may need to implement better validation)
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Check if the email exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, proceed with password reset
        // Generate a token (you may need a better method for production)
        $token = md5(uniqid(rand(), true));

        // Store the token and email in the database for future verification
        $storeTokenQuery = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
        $result = mysqli_query($conn, $storeTokenQuery);

        if ($result) {
            // Redirect to the reset password page with the token
            header("Location: reset-password.php?token=$token");
            exit();
        } else {
            $error = "Failed to initiate password reset. Please try again.";
        }
    } else {
        $error = "Email not found. Please enter a valid email address.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset | Smart Home Devices</title>
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta2/css/bootstrap.min.css">
</head>

<body>
    <!-- Display Message or Error -->
    <div class="container mt-5">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and Popper.js Script Links -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>

</html>
