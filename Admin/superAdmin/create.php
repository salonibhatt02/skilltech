<?php
  include('show2.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminUser Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
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
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="nav">
        <div class="d-flex align-items-center">
            <a href="C:\xampp1\htdocs\Admin\superAdmin\addashani\addashani.php">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
            </a>
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3><h5>Super Admin<h5>
        </div>
        <div class="menu">
            <ul class="listu">
                <a href="homeadmin.php"><li class="list">Home</li></a>
                <a href="\superAdmin\product.php"><li class="list">Product</li></a>
                <a href="\superAdmin\customer.php"><li class="list">Customers</li></a>
                <a href="\superAdmin\offer.php"><li class="list">Offers</li></a>
            </ul>
    </div>
        <!-- profile-->
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">
                <a href="#">Edit Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
      </div><div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <!--<div class="card-header">Create</div>-->
      <div class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="show2.php"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon">back</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">Create:</ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt">Back</i></a></li>
            </ul>
        </div>
      </div>
    </div>
              <div class="card-body">
                <form class="" action="show2.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone No:</label>
                      <input type="text" class="form-control" name="phone" placeholder="Enter Phone No:" value="">
                    </div>
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="Email" class="form-control" name="email" placeholder="Enter Email" value="">
                    </div>
                    <div class="form-group">

                    <!--<label for="gender">Gender:</lable>
                    <input type="radio" id="gender" name="gender" value="male">
                    <label for="male">Male</label>
                   <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>-->



                      <!--<label for="gender">Gender:</label>
                      <input type="radio" class="form-control" name="gender" value="">
                      <label for="male">Male</label><br>
                      <input type="radio" class="form-control" name="gender" value="">
                      <label for="female">Female</label><br>-->
                    </div>
                    <div class="form-group">
                      <label for="image">Password:</label>
                      <input type="password" class="form-control" name="password" value="">
                    </div>
                   <!-- <div class="form-group">
                      <label for="image">Image:</label>
                      <input type="file" class="form-control" name="image" value="">
                    </div>-->
                  
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </body>
</html>

</body>
</html>
