<?php
session_start();
if (!isset($_SESSION['admin'])) {
    // Redirect if the admin is not logged in
    header('location:admin-login.php');
    exit();
}

include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the order ID and new status are set in the POST request
    if (isset($_POST['orderId']) && isset($_POST['newStatus'])) {
        // Sanitize the inputs
        $orderId = $_POST['orderId'];
        $newStatus = $_POST['newStatus'];

        // Update the status in the database, excluding orderdate field
        $update_query = "UPDATE order_details SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("si", $newStatus, $orderId);
        if ($stmt->execute()) {
            // Status updated successfully
            echo json_encode(array("status" => "success"));
        } else {
            // Error updating status
            echo json_encode(array("status" => "error", "message" => "Failed to update status"));
        }
        $stmt->close();
    } else {
        // Order ID or new status not provided
        echo json_encode(array("status" => "error", "message" => "Order ID or new status not provided"));
    }
} else {
    // Invalid request method
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
