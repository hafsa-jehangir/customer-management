<!DOCTYPE html>
<html>
<head>
    
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $user_pwd = "";
    $dbname = "customer";
    $con = mysqli_connect($servername, $username, $user_pwd, $dbname);
    if (!$con) {
        die("Connection failed" . mysqli_connect_error());
    }
    ?>
    <title>Customer Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="email"], 
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-btn {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .login-btn:hover {
            background-color: darkgreen;
        }
        .register-btn {
            background-color: blue;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            margin-top: 10px;
        }
        .register-btn:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Customer Login</h2>

    <!-- Login Form -->
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="login-btn" name="login">Login</button>
    </form>

    <!--Register Button -->
    <a href="register.php"><button type="button" class="register-btn">
        Register
    </button></a>

    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $login = "SELECT * FROM customer_info WHERE cemail='$email' AND cpwd='$pwd'";
        $a = mysqli_query($con, $login);
        $row = mysqli_fetch_array($a);
        $id = $row['cid'];
        $true = mysqli_num_rows($a);
        if ($true == 1) {
            $_SESSION['cid'] = $id;
            echo "<script>window.open('customer.php','_self')</script>";
        } else {
            echo "<script>alert('Your email or password is incorrect, try again')</script>";
        }
    }
    ?>
</div>

</body>
</html>
