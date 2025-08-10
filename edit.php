<?php
    $servername="localhost";
    $username="root";
    $user_pwd="";
    $dbname="customer";
    $con=mysqli_connect($servername,$username,$user_pwd,$dbname);
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    }
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $data="SELECT * FROM customer_info where cid='$id'";
        $query=mysqli_query($con,$data);
        $row=mysqli_fetch_array($query);
        if($row){

                $name=$row['cname'];
                $email=$row['cemail'];
                $pwd=$row['cpwd'];
                $city=$row['ccity'];
                $order=$row['corder'];
                $country=$row['ccountry'];
                $picture=$row['cimg'];
    ?>
    <!DOCTYPE html>
<html>
<head>
    <title>Customer Registration</title>
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
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email ?>" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"  value="<?php echo $pwd ?>" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo $city ?>" required>

        <label for="order">Order:</label>
        <input type="text" id="order" name="order" value="<?php echo $order ?>" required>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $country ?>" required>

        <label for="picture">Picture:</label>
        <input type="hidden" name="old_picture" value="<?php echo $picture; ?>">
        <input type="file" id="picture" name="picture"  required>
        <img src="img/<?php echo $picture ?>" alt="" width="50px" height="50px">

        <div class="button-group">
            <a href="customer.php"><button type="button" class="cancel-btn">Cancel</button></a>
            <button type="submit" class="register-btn" name="update">Update</button>
        </div>
        <?php }
    }  ?>
    </form>
</div>
<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pwd=$_POST['password'];
    $city=$_POST['city'];
    $order=$_POST['order'];
    $country=$_POST['country'];
    if (!empty($_FILES['picture']['name'])) {
    $pic = $_FILES['picture']['name'];
    $temppic = $_FILES['picture']['tmp_name'];
    move_uploaded_file($temppic, "img/$pic");
} else {
    $pic = $_POST['old_picture']; // keep old one
}
    $update = "UPDATE customer_info 
               SET cname='$name', cemail='$email', cpwd='$pwd', ccity='$city', 
                   corder='$order', ccountry='$country', cimg='$pic'
               WHERE cid='$id'";

    if(mysqli_query($con, $update)){
        echo "<script>alert('Customer is updated')</script>";
        echo "<script>window.open('customer.php','_self')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

?>
</body>
</html>