<?php
  session_start();
  if(!isset($_SESSION['mail'])){
    header("Location: ../login.php");
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
      <script>
    function validateForm() {
    var name = document.forms["myForm"]["title"].value;
    var description = document.forms["myForm"]["description"].value;
    var price = document.forms["myForm"]["price"].value;
    var videos = document.forms["myForm"]["videos"].value;
    var duration = document.forms["myForm"]["duration"].value;
    var lecturer = document.forms["myForm"]["lecturer"].value;
    var image = document.forms["myForm"]["image"].value;

    // Regular expression for name (start with capital letter and minimum 2 letters)
    var nameRegex = /^[A-Z][a-zA-Z]{1,}$/;

    // Regular expression for description (any characters)
    var descriptionRegex = /.+/;

    // Regular expression for price (positive numeric value)
    var priceRegex = /^\d+(\.\d{1,2})?$/;

    // Regular expression for positive integer value
    var integerRegex = /^\d+$/;

    // Regular expression for lecturer name (alphabets and spaces)
    var lecturerRegex = /^[A-Z][a-zA-Z]$/;

    // Regular expression for image file (checking for a non-empty string)
    var imageRegex = /.+/;

    if (!name.match(nameRegex)) {
        alert("Name must start with a capital letter and have a minimum of two letters");
        return false;
    }
    if (!description.match(descriptionRegex)) {
        alert("Description must not be empty");
        return false;
    }
    if (!price.match(priceRegex)) {
        alert("Price must be a positive numeric value");
        return false;
    }
    if (!videos.match(integerRegex)) {
        alert("Number of videos must be a positive integer");
        return false;
    }
    if (!duration.match(integerRegex)) {
        alert("Duration must be a positive integer");
        return false;
    }
    // if (!lecturer.match(lecturerRegex)) {
    //     alert("Lecturer name must contain only alphabets and spaces");
    //     return false;
    // }
    if (!image.match(imageRegex)) {
        alert("Please select an image");
        return false;
    }
}
</script>
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
                <a href="transaction.php"><li class="list">Transactionss</li></a>
                <a href="offer.php"><li class="list">Offers</li></a>
            </ul>
        </div>
        <!--<div class="menu">
            <ul class="listu">
                <a href="homeadmin.php"><li class="list"></li></a>
                <a href="index.php"><li class="list"></li></a>
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
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <!--<div class="card-header">Create</div>-->
      <div class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="product.php"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon">back</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">Create:</ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="product.php"><i class="fa fa-sign-out-alt">Back</i></a></li>
            </ul>
        </div>
      </div>
    </div>
<div class="card-body">
<!--***********************************-->

  <form name="myForm" class="" action="add.php" method="post"  onsubmit="return validateForm()">
    <div class="form-group">
      <title></title>
      
        <label for="name">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Name" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" name="description" placeholder="Enter Description" required>
    </div>
    <div class="form-group">
      <label for="categories">Categories: </label>
      <select name="categories" id="">
        <option value="Web Development">Web Development</option>
        <option value="Designing">Designing</option>
        <option value="Android Development">Android Development</option>
        <option value="Analysis">Analysis</option>
      </select>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Enter price" required>
    </div>
    <div class="form-group">
        <label for="videos">No of videos</label>
        <input type="number" class="form-control" name="videos" placeholder="No of Videos" required>
    </div>
    <div class="form-group">
        <label for="duration">Duration(in hours): </label>
        <input type="number" class="form-control" name="duration" placeholder="Duration" required>
    </div>
    <div class="form-group">
        <label for="lecturer">Lecturer</label>
        <input type="text" class="form-control" name="lecturer" placeholder="John Doe" required>
    </div>
    <div class="form-group">
        <label for="image">Choose Image</label>
        <input type="file" class="form-control" name="image" accept="image/png, image/jpeg" required>
    </div>
    <div class="form-group">
        <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
    </div>
</form>

                 <!--***********************************-->
                <!--<form class="" action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="">
                    </div>
                    <div class="form-group">
                      <label for="description">Description:</label>
                      <input type="text" class="form-control" name="description" placeholder="Enter Description" value="">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="price" class="form-control" name="price" placeholder="Enter price" value="">
                    </div>
                    <div class="form-group">
                      <label for="image">Choose Image</label>
                      <input type="file" class="form-control" name="image" value="">
                    </div>
                    <div class="form-group">
                      
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>
                </form>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </body>
</html>
