<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('location:admin-login.php');
    exit; // Stop further execution
}

include 'dbcon.php'; // Include database connection file

// Check if the form is submitted with POST method
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are provided
    if(isset($_POST['blog_id']) && isset($_POST['title']) && isset($_POST['content'])) {
        $blog_id = $_POST['blog_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        // Sanitize input data to prevent SQL injection
        $blog_id = mysqli_real_escape_string($conn, $blog_id);
        $title = mysqli_real_escape_string($conn, $title);
        $content = mysqli_real_escape_string($conn, $content);

        // Update the blog post in the database
        $sql = "UPDATE blog_posts SET title = '$title', content = '$content' WHERE id = '$blog_id'";
        if(mysqli_query($conn, $sql)) {
            // Blog post updated successfully
            header("Location: edit_blog.php?id=$blog_id&status=success&message=Blog+post+updated+successfully");
            exit;
        } else {
            // Error updating blog post
            header("Location: edit_blog.php?id=$blog_id&status=error&message=Failed+to+update+blog+post");
            exit;
        }
    } else {
        // Missing required fields
        header("Location: edit_blog.php?id=$blog_id&status=error&message=Missing+required+fields");
        exit;
    }
} else {
    // Redirect to edit_blog.php if accessed directly without POST request
    header("Location: edit_blog.php?id=$blog_id&status=error&message=Method+Not+Allowed");
    exit;
}
?>
