<!DOCTYPE html>
<html>
<head>
    <title>Customer Profile</title>
    <?php
    session_start();
    $servername="localhost";
    $username="root";
    $user_pwd="";
    $dbname="customer";
    $con=mysqli_connect($servername,$username,$user_pwd,$dbname);
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    } ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            padding: 50px;
        }
        .container {
            width: 600px;
        }
        .homepage-btn {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        .homepage-btn:hover {
            background-color: darkgreen;
        }
        .profile-card {
            display: flex;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .profile-left {
            background: linear-gradient(to bottom, yellow, orange);
            color: black;
            text-align: center;
            padding: 30px 20px;
            width: 40%;
        }
        .profile-left img {
            width: 80px;
            margin-bottom: 15px;
        }
        .profile-left h2 {
            margin: 0;
            font-size: 22px;
        }
        .profile-right {
            padding: 20px;
            width: 60%;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h3 {
            margin-bottom: 10px;
            font-size: 18px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 5px;
        }
        .info-item {
            margin-bottom: 8px;
        }
        .label {
            font-weight: bold;
        }
    </style>
</head>
<body><?php
$id=$_SESSION['cid'];
$data="SELECT * FROM customer_info where cid='$id'";
$query=mysqli_query($con,$data);
$row=mysqli_fetch_array($query);




?>

<div class="container">
    <!-- Homepage Button -->
    <a href='customer.php'><button class="homepage-btn">Homepage</button></a>

    <!-- Profile Card -->
    <div class="profile-card">
        <!-- Left Panel -->
        <div class="profile-left">
           <img src="img/<?php echo $row['cimg']; ?>" alt="img">
            <h2></span><?php echo $row['cname'];?></h2>
        </div>

        <!-- Right Panel -->
        <div class="profile-right">
            <!-- Email Address Section -->
            <div class="info-section">
                <h3>Email Address</h3>
                <div class="info-item"><span class="label">Email:</span><?php echo $row['cemail'];?></div>
                <div class="info-item"><span class="label">Order:</span> <?php echo $row['corder'];?></div>
            </div>
            <!-- Address Section -->
            <div class="info-section">
                <h3>Address</h3>
                <div class="info-item"><span class="label">Country:</span><?php echo $row['ccountry'];?></div>
                <div class="info-item"><span class="label">City:</span><?php echo $row['ccity'];?></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
