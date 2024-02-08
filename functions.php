<?php
include 'dbcon.php'; // Include the database connection file
function getUserName($user_id) {
  
    global $conn; // Access the $conn variable defined in dbcon.php


    // Prepare and execute SQL query to fetch user's name
    $stmt = $conn->prepare("SELECT first_name FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if query returned any rows
    if ($result->num_rows > 0) {
        // Fetch user's name
        $row = $result->fetch_assoc();
        $user_name = $row['first_name'];
    } else {
        // User not found
        $user_name = "Unknown";
    }

    // Close database connection
    $stmt->close();
    $conn->close();

    return $user_name;
}
?>
