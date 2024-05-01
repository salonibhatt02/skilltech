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

  if(isset($_POST['Submit'])){
		    $name = $_POST['name'];
        $phone = $_POST['phone'];
		    $email = $_POST['email'];
        $password = $_POST['password'];
        

		$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

		if($imgName){

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					unlink($upload_dir.$row['image']);
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}else{

			$userPic = $row['image'];
		}

		if(!isset($errorMsg)){
			$sql = "update addadmin set name = '".$name."',phone = '".$phone."', email = '".$email."',gender = '".$gender."',password = '".$password."',
image = '".$image."'where id=".$id;
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('Location:index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}


		}

	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
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
          .form-group{
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
          }
    </style>
  </head>
  <body>
  <div class="nav">
        <div class="d-flex align-items-center">
            <a href="index.php">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
            </a>
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
        </div>
        <div class="menu">
            <ul class="listu">
                <a href="homeadmin.php"><li class="list">Home</li></a>
                <a href="index.php"><li class="list">Product</li></a>
                <a href="customer.php"><li class="list">Customers</li></a>
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
                <a href="#">Edit Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card">
              <!--<div class="card-header">
                Edit Profile
              </div>-->
      <div class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="index.php">Edit User</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt">Back</i></a></li>
            </ul>
        </div>
      </div>
        </div>
              <div class="card-body">
                <form class="" action="index.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="<?php echo $row['name']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="phone">phone:</label>
                      <input type="text" class="form-control" name="phone" placeholder="Enter phone Number" value="<?php echo $row['phone']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter price" value="<?php echo $row['email']; ?>">
                    </div>
                    <!--<div class="form-group">
                      <label for="gender">Gender</label>
                      <input type="radio" class="form-control" name="gender" placeholder="select gender" value="<?php echo $row['gender']; ?>">
                    </div>-->
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="radio" class="form-control" name="password" placeholder="select gender" value="<?php echo $row['password']; ?>">
                    </div>
                    <!--<div class="form-group">
                      <label for="image">Choose Image</label>
                      <div class="col-md-4">-->
                        <!--<img src="<?php echo $upload_dir.$row['image'] ?>" width="100">
                        <input type="file" class="form-control" name="image" value="">-->
                      </div>
                    </div>
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