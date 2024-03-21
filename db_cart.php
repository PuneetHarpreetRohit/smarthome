<?php
session_start();
$user_id=$_SESSION['user_id'];
$url = $_SESSION["url"] ;
include_once 'dbcon.php';
  
			$pro_id = $_GET['pid'];
             
               
                   $ress=mysqli_query($conn," SELECT * FROM cart where user_id='$user_id' AND pro_id='$pro_id'");
                       if(mysqli_num_rows($ress)>0){
                                    // echo"<script> alert('Product Already Added...');</script>";
                                 echo"<script>window.location='$url'</script>";
                       }
                       else{
                                        
		                 $qry="insert into cart values(null,'$pro_id','$user_id',1)"; 
                         $res=mysqli_query($conn,$qry);
                       if($res){ 
                                //   echo"<script> alert('Product Added To Your Cart...!!!');</script>"; 
                                 echo"<script>window.location='$url'</script>";
                                 }
                            else{
                                   echo"<script> alert('Sorry Please Try Again...');</script>";
                                    echo"<script>window.location='$url'</script>";
                                }
				
                         } 
                 
                   
			   ?>