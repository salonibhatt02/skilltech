<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from addadmin where id=".$id;
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
          .card {
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px;
    max-width: 300px;
}

.product-image {
    width: 100%;
    height: auto;
}

.card-content {
    padding: 20px;
}

.product-title {
    margin-top: 0;
    font-size: 1.2em;
    font-weight: bold;
}

.product-description {
    font-size: 0.9em;
    color: #555;
}

.product-price {
    font-size: 1.1em;
    font-weight: bold;
    color: #007bff; /* or any other color you prefer */
}

/***************************************/

/***************************************/

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
                <a href="customer.php"><li class="list">Customers</li></a>
                <a href="customer.php"><li class="list">Offers</li></a>
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
                <a href="#">Edit Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
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
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt">Back</i></a></li>
            </ul>
        </div>
      </div>
    </div>
            



    
<!--*************************************************--->












          <div class="row">
        <div class="col-md-12">
    <div class="card">
    <img src="<?php echo $upload_dir.$row['image'] ?>" height="200">
        <div class="card-content">
            <h3 class="product-title">Name: <span><?php echo $row['name'] ?></span></h3>
            <p class="product-price">Phone No: <span><?php echo $row['phone'] ?></span></p>
            <p class="product-price">Email:<span><?php echo $row['email'] ?></span></p>
            <p class="product-price">Gender:<span><?php echo $row['gender'] ?></span></p>
            <p class="product-price">Password:<span><?php echo $row['password'] ?></span></p>
        </div>
</div>   
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