<?php
session_start();
if(!isset($_SESSION['admin']))
{
header('location:admin-login.php');
}
include 'dbcon.php';
// Fetch all orders from the order_details table
$sql = "SELECT * FROM order_details";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <title>Order Details | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('admin-header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Order Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/login.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->




    <div class="container">
    <h2>Admin Order Details</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>User ID</th>
                <th>Contact 1</th>
                <th>Contact 2</th>
                <th>Address</th>
                <th>State</th>
                <th>City</th>
                <th>Order Date</th>
                <th>Order ID</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
if ($result->num_rows > 0) {
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $count++;
        $highlight_class = '';
        // Add a different class to highlight the last three orders
        if ($count > $result->num_rows - 1) {
            $highlight_class = 'bg-success text-white';
        }
           // Add class based on status
           switch ($row['status']) {
            case 'complete':
                $status_class = 'bg-light-green';
                break;
            case 'pending':
                $status_class = 'bg-light-yellow';
                break;
            default:
                $status_class = '';
                break;
        }
        // Combine highlight and status classes
        $class = $highlight_class . ' ' . $status_class;
        echo "<tr class='$class'>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['contact1'] . "</td>";
        echo "<td>" . $row['contact2'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['orderdate'] . "</td>";
        echo "<td>" . $row['orderid'] . "</td>";
        echo "<td class='status-column'>" . $row['status'] . "
            <div class='dropdown'>
                <button class='btn btn-secondary dropdown-toggle' type='button' id='statusDropdown' data-bs-toggle='dropdown' aria-expanded='false'>
                    Change Status
                </button>
                <ul class='dropdown-menu' aria-labelledby='statusDropdown'>
                    <li><a class='dropdown-item' href='#' onclick='changeStatus(" . $row['id'] . ", \"confirmed\")'>Confirmed</a></li>
                    <li><a class='dropdown-item' href='#' onclick='changeStatus(" . $row['id'] . ", \"pending\")'>Pending</a></li>
                    <li><a class='dropdown-item' href='#' onclick='changeStatus(" . $row['id'] . ", \"complete\")'>Complete</a></li>
                </ul>
            </div>
        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='12'>No orders found</td></tr>";
}
            ?>
        </tbody>
    </table>
</div>

<script>
    function changeStatus(orderId, newStatus) {
        // Send an AJAX request to update the status in the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page after the status is updated
                window.location.reload();
            }
        };
        xhr.send("orderId=" + orderId + "&newStatus=" + newStatus);
    }
</script>


   <?php include_once('footer.php'); ?>