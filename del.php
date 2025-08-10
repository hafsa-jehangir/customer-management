<?php
    $servername="localhost";
    $username="root";
    $user_pwd="";
    $dbname="customer";
    $con=mysqli_connect($servername,$username,$user_pwd,$dbname);
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    }
    if(isset($_GET['del'])){
        $id=$_GET['del'];
        $del="DELETE FROM customer_info where cid='$id'";
        if(mysqli_query($con,$del)){
            echo "<script>alert('Customer is deleted')</script>";
            echo "<script>window.open('customer.php','_self')</script>";
        
        }
    }
    ?>