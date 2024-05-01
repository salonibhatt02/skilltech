<?php 
    session_start();
    if(!isset($_SESSION['mail'])){
        header("Location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="home.css">
</head>

<style>
    table{
        margin: 70px 30px 0px 30px;
        width: 96vw !important;
    }
    .status{
        font-weight: bold;
    }
    .active{
        color: #007bff !important;
    }
    .paid {
        color: #28a745 !important;
    }

    .failure {
        color: red !important;
    }
    #transactionTable_wrapper{
        margin-top: 50px;
    }
    #transactionTable_length{
        margin-left: 28px;
        margin-bottom: 10px;
        color: white;
    }
    .dataTables_length select {
        color: white;
        background-color: black !important;
        cursor: pointer;
    }
    #transactionTable_filter{
        margin-right: 30px;
    }
    #transactionTable_filter > label{
        color: white;
    }
    #transactionTable_filter input{
        color: white;
    }
    #transactionTable_paginate{
        margin-right: 30px;
        margin-top: 10px;
    }
    #transactionTable_info{
        color: white;
        margin-left: 28px;
        margin-top: 7px;
    }
    .paginate_button,.paginate_button.disabled{
        color: white;
        background-color: white;
    }
    #transactionTable_previous{
        color: white;
        background-color: white;
    }
    #transactionTable_next{
        color: white;
        background-color: white;
    }
</style>
<body>
    <div class="nav">
        <div class="d-flex align-items-center">
        <a href="admin.php">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
        </a>
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
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">
                <p>Hi, <?php echo $_SESSION['aname'] ?></p>
                <a href="set_authorization.php">Set Authorization</a>
                <!--<a href="#">Settings</a>-->
                <a href="logout.php">Logout</a>
            </div>
      </div>
    </div>

    <table id="transactionTable" class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Phone no</th>
              <th scope="col">Email</th>
              <th scope="col">Date</th>
              <th scope="col">Amount</th>
              <th scope="col">Course</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php

                include "connect.php";

                // $session_email = $_SESSION['email'];

                $sql = "Select * from fetch_pl_details ORDER BY `link_created_at` DESC";
                $result = mysqli_query($conn, $sql);
                $Sno = 0;
                while($row = mysqli_fetch_assoc($result)){

                    $Sno = $Sno + 1;
                    // Convert datetime string to DateTime object
                    $dateTime = new DateTime($row['link_created_at']);
                    // Format the date to display only the date portion
                    $date = $dateTime->format('d-m-Y');

                    echo "<tr>
                    <th scope='row'>" . $Sno. ".". "</th>
                    <td>" .$row['customer_name']. "</td>
                    <td>" .$row['customer_phone']. "</td>
                    <td>" .$row['customer_email']. "</td>
                    <td>" .$date. "</td>
                    <td>" .$row['link_amount']. "</td>
                    <td>" .$row['link_purpose']. "</td>
                    <td class='status'>" .$row['link_status']. "</td>
                    </tr>";
                }
                
            ?>
          </tbody>    
    </table>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#transactionTable').DataTable();
        });

        document.addEventListener("DOMContentLoaded", function() {
            var statusElements = document.querySelectorAll(".status");
            statusElements.forEach(function(element) {
                var statusText = element.innerHTML.trim();
                if (statusText === "ACTIVE") {
                    element.classList.add("active");
                } else if (statusText === "PAID") {
                    element.classList.add("paid");
                } else if (statusText === "CANCELLED") {
                    element.classList.add("failure");
                }
            });
        });
    </script>
</body>
</html>