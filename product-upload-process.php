<?php
session_start();

// Include database connection
include 'dbcon.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    // File upload handling
    $targetDir = "img/products/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');</script>";
        
        $uploadOk = 0;
    }
    
    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "<script>alert('Sorry, file already exists.');</script>";
       
        $uploadOk = 0;
        echo '<script>window.location.href = "upload-products.php";</script>';
    }
    
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
      
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
       
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
       
        echo '<script>window.location.href = "upload-products.php";</script>';
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert product details into database
            $insertQuery = "INSERT INTO products (title, category, description, price, image) VALUES ('$title', '$category', '$description', '$price', '$targetFile')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "<script>alert('Product uploaded successfully.');</script>";
               
                echo '<script>window.location.href = "upload-products.php";</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
             
            echo '<script>window.location.href = "upload-products.php";</script>';
        }
    }
}
?>
