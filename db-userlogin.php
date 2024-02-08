<?php
session_start();
// session_unset($_SESSION['user_id']);  
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
            $_SESSION["user_id"] =  $row["id"];
            // User authentication successful
            if ($rememberMe) {
                // Set cookies for longer session
                setcookie("user_email", $email, time() + (86400 * 30), "/"); // 30 days
                setcookie("user_password", $password, time() + (86400 * 30), "/"); // 30 days
            }
            echo"<script>window.location='index.php'</script>";
        } else {
            echo"<script> alert('Sorry Incorrect password...!!');</script>"; 
            echo"<script>window.location='user-login.php'</script>";
            
        }
    } else {
        echo"<script> alert('Sorry First Register Your Self...!!');</script>"; 
               echo"<script>window.location='signup.php'</script>";
    }
}
$conn->close();
?>
