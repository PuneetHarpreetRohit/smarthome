<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: admin-login.php');
    exit; // Stop further execution
}

include 'dbcon.php';

// Check if blog post ID is provided
if (!isset($_GET['id'])) {
    // Redirect with error message
    header('Location: blog-management.php?error=' . urlencode('Blog post ID is missing.'));
    exit; // Stop further execution
}

$blog_id = $_GET['id'];

// Perform deletion
$sql = "DELETE FROM blog_posts WHERE id = '$blog_id'";
if ($conn->query($sql) === TRUE) {
    // Deletion successful
    $status = 'success';
} else {
    // Deletion failed
    $status = 'error';
    $message = 'Error deleting blog post: ' . $conn->error;
}

// Redirect back to blog-management.php
header('Location: blog-management.php?status=' . $status . '&message=' . urlencode($message));
exit; // Stop further execution
?>
