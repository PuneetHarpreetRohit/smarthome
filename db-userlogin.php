<?php
include 'dbcon.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rememberMe = isset($_POST["rememberMe"]) ? 1 : 0;

    // SQL query to check user credentials
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // User authentication successful
            if ($rememberMe) {
                // Set cookies for longer session
                setcookie("user_email", $email, time() + (86400 * 30), "/"); // 30 days
                setcookie("user_password", $password, time() + (86400 * 30), "/"); // 30 days
            }
            echo "Login successful!";
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}
$conn->close();
?>
