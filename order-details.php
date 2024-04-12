<?php
session_start();
if (!isset($_SESSION['admin'])) {
header('location:admin-login.php');
}
include 'dbcon.php';

    // Check if the filter option is selected
    if (isset($_GET['filter'])) {
        $filter = $_GET['filter'];
        if ($filter == 'YESTERDAY') {
            $sql = "SELECT * FROM order_details WHERE DATE(orderdate) = CURDATE() - INTERVAL 1 DAY";
        } else {
            $sql = "SELECT * FROM order_details WHERE orderdate >= NOW() - INTERVAL 1 $filter";
        }
    } else {
        $sql = "SELECT * FROM order_details";
    }

    $result = $conn->query($sql);

    // Initialize an array to store order data
    $orderData = array();

    // Fetch order data and store in the array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Fetch total products for each order ID
            $order_id = $row['orderid'];
            $total_products_query = "SELECT COUNT(*) AS total_products FROM order_items WHERE orderid = '$order_id'";
            $total_products_result = $conn->query($total_products_query);
            $total_products_row = $total_products_result->fetch_assoc();
            $row['total_products'] = $total_products_row['total_products'];

            // Add the row to the order data array
            $orderData[] = $row;
        }
    }

    // Convert order data array to JSON format
    $orderDataJson = json_encode($orderData);
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
    <div class="container-fluid pt-5 bg-primary hero-header ">
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


</head>

<body>

    <!-- Other HTML content as before -->

    <div class="container">
        <h2 class="m-5">List of Products Order</h2>

        <!-- Add download button -->
        <div class="mb-4">
            <button onclick="downloadExcel()" class="btn btn-primary">Download Order Details as Excel</button>
        </div>

        <!-- Filter Dropdown -->
        <div class="mb-4">
            <form action="" method="GET">
                <select name="filter" onchange="this.form.submit()">
                    <option value="" disabled selected>Select Filter</option>
                    <option value="YEAR">This Year</option>
                    <option value="MONTH">This Month</option>
                    <option value="WEEK">This Week</option>
                    <option value="YESTERDAY">Yesterday</option>
                    <option value="DAY">Today</option>
                </select>
            </form>
        </div>

        <div class="table-responsive ">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>User ID</th>
                        <th>Contact</th>
                        <th>City</th>
                        <th>Order Date</th>
                        <th>Order ID</th>
                        <th>Detail</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Total Products</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($orderData)) {
                        foreach ($orderData as $row) {
                            // Determine the background color based on status
                            $rowColor = getStatusColor($row['status']);
                            // Output the table row with the corresponding background color
                            echo "<tr style='background-color: $rowColor;'>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['fname'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['contact1'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td>" . $row['orderdate'] . "</td>";
                            echo "<td>" . $row['orderid'] . "</td>";
                            echo "<td>";
                            echo "<a href='view-user-order.php?order_id=" . $row['orderid'] . "' class='btn btn-primary'>View</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='dropdown'>";
                            echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='statusDropdown' data-bs-toggle='dropdown' aria-expanded='false'>";
                            echo $row['status'];
                            echo "</button>";
                            echo "<ul class='dropdown-menu' aria-labelledby='statusDropdown'>";
                            echo "<li><a class='dropdown-item' href='#' onclick='changeStatus(" . $row['id'] . ", \"complete\")'>Complete</a></li>";
                            echo "<li><a class='dropdown-item' href='#' onclick='changeStatus(" . $row['id'] . ", \"pending\")'>Pending</a></li>";
                            echo "<li><a class='dropdown-item' href='#' onclick='changeStatus(" . $row['id'] . ", \"confirmed\")'>Confirmed</a></li>";
                            echo "</ul>";
                            echo "</div>";
                            echo "</td>";
                            echo "<td>" . $row['payment_mode'] . "</td>";
                            echo "<td>" . $row['total_products'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No orders found</td></tr>";
                    }

                    function getStatusColor($status)
                    {
                        switch ($status) {
                            case 'complete':
                                return 'white'; // White color for 'complete'
                                break;
                            case 'pending':
                                return 'yellow'; // Yellow color for 'pending'
                                break;
                            default:
                                return 'lightgreen'; // Light green color for 'confirmed'
                                break;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
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

        function downloadExcel() {
            var orderData = <?php echo $orderDataJson; ?>; // Get order data from PHP

            var excelData = "ID\tFull Name\tEmail\tUser ID\tContact\tCity\tOrder Date\tOrder ID\tStatus\tPayment\tTotal Products\n";
            orderData.forEach(function(row) {
                excelData += row.id + "\t" + row.fname + "\t" + row.email + "\t" + row.user_id + "\t" + row.contact1 + "\t" + row.city + "\t" + row.orderdate + "\t" + row.orderid + "\t" + row.status + "\t" + row.payment_mode + "\t" + row.total_products + "\n";
            });

            var blob = new Blob([excelData], { type: 'application/vnd.ms-excel' });
            var a = document.createElement('a');
            a.href = window.URL.createObjectURL(blob);
            a.download = 'order_details.xls';
            document.body.appendChild(a); // Append anchor to body
            a.click(); // Trigger the download
            document.body.removeChild(a); // Remove anchor from body
        }
    </script>

    <?php include_once('footer.php'); ?>
</body>

</html>
