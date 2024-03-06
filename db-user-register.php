<?php

include 'dbcon.php'; // Include the database connection file


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // SQL query to insert data
    $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo"<script>window.location='user-login.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo"<script> alert('Sorry Try Again Register Your Self...!!');</script>"; 
        echo"<script>window.location='signup.php'</script>";
    }

    $conn->close();
}
?>
