
    <?php
    session_start();
    if(!isset($_SESSION['cid'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else {
    
    ?>
    <?php
    $servername="localhost";
    $username="root";
    $user_pwd="";
    $dbname="customer";
    $con=mysqli_connect($servername,$username,$user_pwd,$dbname);
    if(!$con){
        die("Connection failed".mysqli_connect_error());
    }?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <title>Customer Management Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(
  135deg,
  #ffe6f0 0%,   /* light pink */
  #ffb3d9 20%,  /* medium pink */
  #ffd6e6 40%,  /* pinkish peach */
  #ffcce6 60%,  /* pastel coral-pink */
  #ffe6f7 80%,  /* very light pink-lilac */
  #fff0f5 100%  /* almost white */
);
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: flex-end;
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-left: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .header button:hover {
            background-color: #0056b3;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f8f8;
            position: relative;
        }
        th .sort-icon {
            font-size: 12px;
            margin-left: 5px;
            cursor: pointer;
        }
        .action-icons {
            display: flex;
            gap: 10px;
        }
        .edit-icon {
            color: orange;
            cursor: pointer;
            font-weight: bold;
        }
        .delete-icon {
            color: red;
            cursor: pointer;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="header">
        <a href="logout.php"><button>Logout</button></a>
        <a href="profile.php"><button>Profile</button></a>
    </div>

    <div class="container">
        <h2>Customer Management</h2>
        <table>
            <thead>
                <tr>
                    <th>ID  <span class="sort-icon"> </span></th>
                    <th>Name <span class="sort-icon">▲▼</span></th>
                    <th>Email <span class="sort-icon">▲▼</span></th>
                    <th>City <span class="sort-icon">▲▼</span></th>
                    <th>Order <span class="sort-icon">▲▼</span></th>
                    <th>Country <span class="sort-icon">▲▼</span></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cust="SELECT * FROM customer_info";
                $data=mysqli_query($con,$cust);
                while($row=mysqli_fetch_array($data)){
                    $cid=$row['cid'];
                    $name=$row['cname'];
                    $email=$row['cemail'];
                    $pwd=$row['cpwd'];
                    $city=$row['ccity'];
                    $order=$row['corder'];
                    $country=$row['ccountry'];


                
                ?>
                    <tr></tr>
                    <td><?php echo $cid;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $city;?></td>
                    <td><?php echo $order;?></td>
                    <td><?php echo $country;?></td>
                    <td class="action-icons">
                        <a class="edit-icon" href="edit.php?edit=<?php echo $cid?>"><i class="fa-solid fa-pen"></i></a>
                        <a class="delete-icon" href="del.php?del=<?php echo $cid?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                <?php }?>
                </tr>
                
            </tbody>
        </table>
    </div>
    

</body>
</html>
<?php }?>
