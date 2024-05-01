<?php
// session_start();
// Check if the user is not logged in, if yes, redirect to login page
// if(!isset($_SESSION['mail'])) {
//     header("Location: login.php");
// }

// Retrieve user data from session
// $username = $_SESSION['username'];


// Database connection parameters
// $servername = "localhost";
// $username = "username";
// $password = "";
// $dbname = "skilltech";

// Create connection
// $conn = new mysqli($servername, $username,$password, $dbname);

include "connect.php";
// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// Query to get total product count
session_start();
if(!isset($_SESSION['mail'])){
    header("Location: ../login.php");
}
$sql = "SELECT COUNT(*) AS total_product FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $totalproduct = $row["total_product"];
        //echo "Total product: " . $totalproduct;
    }
} else {
    echo "No product found.";
}

$sql1 = "SELECT COUNT(*) AS total_customers FROM customers";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // Output data of each row
    while($row = $result1->fetch_assoc()) {
        $totalcustomers = $row["total_customers"];
        //echo "Total product: " . $totalproduct;
    }
} else {
    echo "No customers found.";
}

$sql2 = "SELECT COUNT(*) AS total_orders FROM fetch_pl_details WHERE link_status='PAID'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // Output data of each row
    while($row = $result2->fetch_assoc()) {
        $totalorders = $row["total_orders"];
        //echo "Total product: " . $totalproduct;
    }
} else {
    echo "No customers found.";
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
         .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height:40vh;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: large;
            font-weight: bold;
        }
        .box {
            flex: 3;
            max-width: 400px;
            margin: 20px;
            padding: 5px;
            text-align: center;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #282854;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            } 
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="nav">
        <div class="d-flex align-items-center">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
        </div>
        <div class="menu">
            <ul class="listu">
                <a href="admin.php"><li class="list">Home</li></a>
                <a href="product.php"><li class="list">Product</li></a>
                <a href="transaction.php"><li class="list">Transactions</li></a>
                <a href="offer.php"><li class="list">Offers</li></a>
            </ul>
            </div>

             <!-- profile-->
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">
                <p>Hi, <?php echo $_SESSION['aname'] ?></p>
                <a href="set_authorization.php">Set Authorization</a>
                <!--<a href="#">Settings</a>-->
                <a href="logout.php">Logout</a>
            </div>
      </div>

<div class="container">
    <div class="box">
        <i class="fas fa-shopping-cart icon"></i>
        <h4>Products</h4>
        <p>Total Products: <?php echo $totalproduct ?></p>
        <!-- <a href="#" class="btn btn-primary">Manage product</a> -->
    </div>
    <div class="box">
        <i class="fas fa-user icon"></i>
        <h4>Customers</h4>
        <p>Total Customers: <?php echo $totalcustomers ?></p>
        <!-- <a href="#" class="btn btn-primary">Manage Customers</a> -->
    </div>
    <div class="box">
        <i class="fas fa-shopping-bag icon"></i>
        <h4>Orders</h4>
        <p>Total Orders: <?php echo $totalorders ?></p>
        <!-- <a href="#" class="btn btn-primary">Manage Orders</a> -->
    </div>
    <!--<div class="box">
        <i class="fas fa-chart-line icon"></i>
        <h4>Analytics</h4>
        <p>View Sales Analytics</p>
        <a href="#" class="btn btn-primary">View Analytics</a>
    </div>-->
</div>

</body>
</html>