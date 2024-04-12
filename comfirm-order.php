<?php
session_start();

if (isset($_POST["submit"])) {
    include_once 'dbcon.php';

    $fname = $_POST["fullname"];
    $email = $_POST["email"];
    $user_id = $_SESSION['user_id'];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phcon = $phone1 . ", " . $phone2;
    $add = $_POST["address"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $orderid = "req-" . rand(33333, 99999) . "-" . uniqid();
    $status = "confirmed";
    $payment_mode = $_POST["payment_mode"];
    
    $currentdate = date('Y-m-d H:i:s');

    $qry = "INSERT INTO order_details VALUES(null, '$fname', '$email', '$user_id', '$phone1', '$phone2', '$add', '$state', '$city', '$currentdate', '$orderid', '$status', '$payment_mode')";
    $resz = mysqli_query($conn, $qry);

    if (!$resz) {
        echo mysqli_error($conn);
    }
    
    if ($resz) {
        $res = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = $user_id");
        while ($row = mysqli_fetch_array($res)) {
            $cart_id = $row[0];
            $p_id = $row[1];
            $quant = $row[3];
            $qryy = "INSERT INTO order_items VALUES(null, '$user_id', '$p_id', '$quant', '$orderid')";
            $ress = mysqli_query($conn, $qryy);
           
            if (!$ress) {
                echo "<script>alert('Network Problem - Please Try Again...');</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
        $qryv = "DELETE FROM cart WHERE user_id='$user_id'";
        $exe = mysqli_query($conn, $qryv);
        if (!$exe) {
            echo "<script>alert('Network Problem - Error to Empty a Cart...!!');</script>";
            echo "<script>window.location='cart.php'</script>";
        }

        // Send confirmation email to the user
        $to = $email;
        $subject = "Thank you for your order!";
        $message = "Your order has been successfully placed with order ID: $orderid. We will process it shortly.\n\nThank you for shopping with us!";
        $headers = "From: harpreetsgca@gmail.com";
        mail($to, $subject, $message, $headers);

        // Send order notification email to admin
        $admin_email = "harpreetsgca@gmail.com";
        $admin_subject = "New Order Received";
        $admin_message = "New order has been received with the following details:\n\nOrder ID: $orderid\nCustomer Name: $fname\nEmail: $email\nPhone: $phcon\nAddress: $add, $city, $state\nPayment Mode: $payment_mode";
        mail($admin_email, $admin_subject, $admin_message, $headers);

        mysqli_close($conn);
        echo "<script>window.location='thank-you.php?order_id=$orderid'</script>";
    } else {
        mysqli_close($conn);
        echo "<script>alert('Network Problem-  Please Try Again...');</script>";
        echo "<script>window.location='cart.php'</script>";
    }
}
?>
