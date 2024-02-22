<?php
 
          
include_once 'dbcon.php'; // Include the database connection file
 
function check_if_added_to_cart($item_id, $conn){
    $user_id = $_SESSION['user_id'];
    $product_check_query = "SELECT * FROM cart WHERE product_id='$item_id' AND user_id='$user_id'";
    $product_check_result = mysqli_query($conn, $product_check_query) or die(mysqli_error($conn));
    $num_rows = mysqli_num_rows($product_check_result);
    if($num_rows >= 1) {
        return 1;
    } else {
        return 0;
    }
}
?>
