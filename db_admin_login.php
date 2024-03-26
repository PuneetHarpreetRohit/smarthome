<?php
session_start();
include 'dbcon.php';

if(isset($_POST['submit'])) {
    $un = $_POST['email'];
    $pw = $_POST['pass']; 

    $qry="select * from admin_login where email='$un'";
    $res=mysqli_query($conn, $qry);
      $row= mysqli_fetch_array($res);
      if($un=="$row[email]" && $pw=="$row[password]"){
          
              if(!isset($_SESSION['admin']))
                   { 
                       $_SESSION["admin"]="$un";

                    echo"<script>window.location='admin-dashboard.php'</script>";
                   }
               else{ 
                   echo "<script>alert('User aleary have login...');</script>";
                   echo"<script>window.location='admin-dashboard.php'</script>";
                   }
           
    }
     else{
           echo"<script> alert('Sorry First Register YourSelf...!!');</script>"; 
           echo"<script>window.location='admin-login.php'</script>";
     }
    
}
?>
