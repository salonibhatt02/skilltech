<?php
  include('db.php');
  // $upload_dir = 'uploads/';

  session_start();
    if(!isset($_SESSION['mail'])){
      header("Location: ../login.php");
    }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $sql = "select * from product where id=".$id;
    $sql = "SELECT * FROM `product` where `id`='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
      .container{
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight: bold;
        margin-top: 20px;
      }
      .form-group{
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-weight: bold;
      }
      .back{
            border: none;
            color: white;
            padding: 6px 6px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            font-weight: bolder;
            background-color: #0d6efd; 
          }
      .btn{
            border: none;
            color: white;
            padding: 6px 6px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            font-weight: bolder;
            background-color: #282854; 

          } 
          .row{
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
          }
          .navbar-brand{
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
          }
          .card{
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
          }
          .col-md{
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
          }
          .name{
            font-weight: bold;
          }
          .form-control{
            display: flex;
            justify-content: left;
            text-align: justify;
            padding-left: 40px;
            padding-right: 100px;
            width: 80%;
            margin: auto;
            margin-bottom: 8px;
          }
          .col-md-12 > img{
            margin-top: -10px;
            margin-bottom: 8px;
          }
    </style>
  </head>
  <body>
  <div class="nav">
        <div class="d-flex align-items-center">
          <a href="product.php">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
            </a>
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
        </div>
        <div class="menu">
            <ul class="listu">
                <a href="homeadmin.php"><li class="list">Home</li></a>
                <a href="product.php"><li class="list">Product</li></a>
                <a href="transaction.php"><li class="list">Transactions</li></a>
                <a href="offer.php"><li class="list">Offers</li></a>
            </ul>
        </div>
        <!--<div class="menu">
            <ul class="listu">
                <a href="homeadmin.php"><li class="list"></li></a>
                <a href="product.php"><li class="list"></li></a>
                <a href="customer.php"><li class="list"></li></a>
            </ul>
        </div>-->
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">
                <p>Hi, <?php echo $_SESSION['aname'] ?></p>
                <a href="set_authorization.php">Set Authorization</a>
                <!--<a href="#">Settings</a>-->
                <a href="logout.php">Logout</a>
            </div>
      </div>
      <!--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
          <a class="navbar-brand" href="index.php">View</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
          </div>
        </div>
      </nav>-->
      <div class="container">
        <div class="row justify-content-center">
          <div class="card">
            <!--<div class="card-header">-->
      <div class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="product.php">Product View</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon">back</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="product.php"><i class="fa fa-sign-out-alt">Back</i></a></li>
            </ul>
        </div>
      </div>
    </div>
             <!-- product Details-->
            <!--</div>
            <div class="card-body">-->
            <!--<div class='card' style='width: 22rem;'>
                    <img src='C:\xampp1\htdocs\skilltechadmin\uploads".$row['image']."' class='card-img-top' alt='...' height='220px' width='150px'>
                    <div class='card-body'>
                    <h5 class='card-title'>" . $row['title'] . "</h5> 
                    <span class='card-price'>Rs. " . $row['description'] . "</span>
                    <p class='card-text'>" . $row['price'] . "</p>
                    <center>
                    <a href='a' class='btn btn-primary'>BUY NOW</a>
                    </center>
                    </div>
                </div>";-->
          <div class="row">
                <div class="col-md-12">
                    <img src='\skilltech\product-img\<?php echo $row['image'] ?>' height="200">
                </div>
                <!-- $upload_dir. -->
                <div class="col-md">
                    <h5 class="form-control">
                      <!-- <i class="fa fa-user-tag"> -->
                      <span class="name">Title: &nbsp</span>
                      <span><?php echo $row['title'] ?></span>
                    </h5>

                    <h5 class="form-control">
                      <!-- <i class="fa fa-mobile-alt"> -->
                    <span class="name">Description: &nbsp</span>
                      <span><?php echo $row['description'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <!-- <i class="fa fa-mobile-alt"> -->
                    <span class="name">Category: &nbsp</span>
                      <span><?php echo $row['categories'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <!-- <i class="bi bi-tag"> -->
                    <span class="name">Price: &nbsp</span>
                      <span><?php echo $row['price'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <!-- <i class="fa fa-mobile-alt"> -->
                    <span class="name">No of Videos: &nbsp</span>
                      <span><?php echo $row['videos'] ?></span>
                    </i></h5>
                    <h5 class="form-control">
                      <!-- <i class="fa fa-mobile-alt"> -->
                    <span class="name">Duration: &nbsp</span>
                      <span><?php echo $row['duration'] ?> hours</span>
                    </i></h5>
                    <h5 class="form-control">
                      <!-- <i class="fa fa-mobile-alt"> -->
                    <span class="name">Lecturer: &nbsp</span>
                      <span><?php echo $row['lecturer'] ?></span>
                    </i></h5>
                    <!--<a class="back" href="product.php"><i class="back"></i><span>Back</span></a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="js/bootstrap.min.js" charset="utf-8"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
      <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
        } );
      </script>
    </body>
  </html>