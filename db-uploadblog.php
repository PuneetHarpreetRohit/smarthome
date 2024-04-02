<?php
// Include database connection file
include 'dbcon.php';

// Get form data
$title = $_POST['title'];
$content = $_POST['content'];
$created_at = date('Y-m-d H:i:s');

// Sanitize form data
$title = mysqli_real_escape_string($conn, $title);
$content = mysqli_real_escape_string($conn, $content);

// Insert blog post into database
$sql = "INSERT INTO blog_posts (title, content, created_at) VALUES ('$title', '$content', '$created_at')";

if (mysqli_query($conn, $sql)) {
    // Blog post saved successfully
    echo '<script>alert("Blog post uploaded successfully.");</script>';
    echo '<script>window.location.href = "upload-blog.php";</script>';
} else {
    // Error saving blog post
    echo '<script>alert("Error uploading blog post: ' . mysqli_error($conn) . '");</script>';
    echo '<script>window.location.href = "upload-blog.php";</script>';
}

// Close database connection
mysqli_close($conn);
?>
