<?php
require 'PHPExcel/Classes/PHPExcel.php'; // Include PHPExcel library
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:admin-login.php');
}
include 'dbcon.php';

// Check if the filter option is selected
if(isset($_GET['filter'])) {
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

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Your Name")
                             ->setLastModifiedBy("Your Name")
                             ->setTitle("Order Details")
                             ->setSubject("Order Details")
                             ->setDescription("Order details exported from your website.")
                             ->setKeywords("order details")
                             ->setCategory("Order Details");

// Add column headers
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', 'Full Name')
            ->setCellValue('C1', 'Email')
            ->setCellValue('D1', 'User ID')
            ->setCellValue('E1', 'Contact')
            ->setCellValue('F1', 'City')
            ->setCellValue('G1', 'Order Date')
            ->setCellValue('H1', 'Order ID')
            ->setCellValue('I1', 'Status')
            ->setCellValue('J1', 'Total Products');

// Add data from the database
if ($result->num_rows > 0) {
    $rowIndex = 2; // Start from row 2 to leave space for column headers
    while ($row = $result->fetch_assoc()) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $rowIndex, $row['id'])
                                      ->setCellValue('B' . $rowIndex, $row['fname'])
                                      ->setCellValue('C' . $rowIndex, $row['email'])
                                      ->setCellValue('D' . $rowIndex, $row['user_id'])
                                      ->setCellValue('E' . $rowIndex, $row['contact1'])
                                      ->setCellValue('F' . $rowIndex, $row['city'])
                                      ->setCellValue('G' . $rowIndex, $row['orderdate'])
                                      ->setCellValue('H' . $rowIndex, $row['orderid'])
                                      ->setCellValue('I' . $rowIndex, $row['status'])
                                      ->setCellValue('J' . $rowIndex, $total_products);
        $rowIndex++;
    }
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Order Details');

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="order_details.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
