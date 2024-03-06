<?php
session_start();
if(isset($_SESSION['user_id'])) {
    $u_id = $_SESSION['user_id'];
} else {
    echo "<script>window.location='user-login.php'</script>";
    exit; // Stop further execution
}

include_once 'dbcon.php'; // Include the database connection file

if(isset($_GET['cart_id']) && isset($_GET['quantity'])) {
    $cart_id = mysqli_real_escape_string($conn, $_GET['cart_id']);
    $quantity = mysqli_real_escape_string($conn, $_GET['quantity']);
    
    // Update the cart item with the new quantity
    $sql = "UPDATE cart SET quantity = '$quantity' WHERE id = '$cart_id' AND user_id = '$u_id'";
    if(mysqli_query($conn, $sql)) {
        //echo "<script>alert('Cart updated successfully');</script>";
        echo "<script>window.location='cart.php'</script>";
    } else {
        echo "<script>alert('Error updating cart');</script>";
        echo "<script>window.location='cart.php'</script>";
    }
} else {
    echo "<script>alert('Invalid request');</script>";
    echo "<script>window.location='cart.php'</script>";
}
?>
