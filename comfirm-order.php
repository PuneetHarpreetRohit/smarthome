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
    $currentdate = date('Y-m-d H:i:s');

    $qry = "INSERT INTO order_details VALUES(null, '$fname', '$email', '$user_id', '$phone1', '$phone2', '$add', '$state', '$city', '$currentdate', '$orderid', '$status')";
    $resz = mysqli_query($conn, $qry);

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

        mysqli_close($conn);
        echo "<script>window.location='thank-you.php?order_id=$orderid'</script>";
    } else {
        mysqli_close($conn);
        echo "<script>alert('Network Problem-  Please Try Again...');</script>";
        echo "<script>window.location='cart.php'</script>";
    }
}
?>
