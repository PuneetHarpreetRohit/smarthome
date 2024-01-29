<?php
// Include your database connection file (dbcon.php)
include_once('dbcon.php');

// Check if the token is provided in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Retrieve the email associated with the token
    $getEmailQuery = "SELECT email FROM users WHERE reset_token = '$token'";
    $result = mysqli_query($conn, $getEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
    } else {
        $error = "Invalid or expired token. Please initiate the password reset process again.";
    }
} else {
    // Redirect to the forgot_password.html page if the token is not provided
    header("Location: forgot_password.html");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new password from the form
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate and sanitize the new password (you may need to implement better validation)
    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the user's password and reset token in the database
    $updatePasswordQuery = "UPDATE users SET password = '$newPassword', reset_token = NULL WHERE email = '$email'";
    $result = mysqli_query($conn, $updatePasswordQuery);

    if ($result) {
        $message = "Password reset successfully.";
    } else {
        $error = "Failed to reset password. Please try again.";
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
        <?php if (isset($message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
            <p>You can now <a href="user-login.php">log in</a> with your new password.</p>
        <?php elseif (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php else : ?>
            <!-- Password Reset Form -->
            <form action="" method="post">
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and Popper.js Script Links -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
</body>

</html>
