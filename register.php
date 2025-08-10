<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
    <?php
    $servername="localhost";
    $username="root";
    $user_pwd="";
    $dbname="customer";
    $con=mysqli_connect($servername,$username,$user_pwd,$dbname);
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    }
    
    
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        .cancel-btn {
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .register-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .cancel-btn:hover {
            background-color: #f0f0f0;
        }
        .register-btn:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Customer Registration</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="order">Order:</label>
        <input type="text" id="order" name="order" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>

        <label for="picture">Picture:</label>
        <input type="file" id="picture" name="picture" required>

        <div class="button-group">
            <a href="login.php"><button type="button" class="cancel-btn">Cancel</button></a>
            <button type="submit" class="register-btn" name="register">Register</button>
        </div>
    </form>
</div>
<?php
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $city = $_POST['city'];
    $order = $_POST['order'];
    $country = $_POST['country'];
    $picture = $_FILES['picture']['name'];
    $tmp_picture = $_FILES['picture']['tmp_name'];
    move_uploaded_file($tmp_picture,"img/$picture");
    $register="INSERT INTO customer_info(cname,cemail,cpwd,ccity,corder,ccountry,cimg) values('$name','$email','$pwd','$city','$order','$country','$picture')";
    if(mysqli_query($con,$register)){
        echo "<script>window.open('login.php','_self')</script>";
    }
}



?>


</body>
</html>
