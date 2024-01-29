<?php

include 'dbcon.php'; // Include the database connection file


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $address = $_POST["address"];
    $state = $_POST["state"];
    $city = $_POST["city"];

    // SQL query to insert data
    $sql = "INSERT INTO users (first_name, last_name, email, phone_number, password, address, state, city) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$password', '$address', '$state', '$city')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
