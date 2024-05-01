<?php
  include('db.php');
  $upload_dir = 'uploads/';

  if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql = "select * from addadmin where id = ".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$image = $row['image'];
			unlink($upload_dir.$image);
			$sql = "delete from addadmin where id=".$id;
			if(mysqli_query($conn, $sql)){
				header('location:index.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DisplayUsers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
    .navbar-toggler{
        background-color: black;
       }
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
          .card-body{
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
          }
          .tr{
            text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
          }
       
    </style>
  </head>
  <body>
  <div class="nav">
        <div class="d-flex align-items-center">
            <a href="C:\xampp1\htdocs\Admin\superAdmin\admin.php">
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
                    <!--<div class="card-header">All addadmin</div>-->
        <div class="navbar navbar-expand-md navbar-light navbar-laravel">
       <!-- <div class="container">-->
          <a class="navbar-brand" href="index.php"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-primary" href="create.php"><i class="fa fa-user-plus">Create</i></a></li>
              </ul>
          </div>
        </div>
      <div>
         <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone No</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <!--<tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                          </tr>
                        </tfoot>-->
                        <tbody>
                          <?php
                            $sql = "select * from addadmin";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                            <td class="tr"><?php echo $row['id'] ?></td>
                            <!--<td class="tr"><img src="" height="50" width="50"></td>-->
                            <td class="tr"><?php echo $row['name'] ?></td>
                            <td class="tr" ><?php echo $row['phone'] ?></td>
                            <td class="tr" ><?php echo $row['email'] ?></td>
                            <td class="tr" ><?php echo $row['password'] ?></td>
                        
                            <td class="text-center">
                              
                              <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn"><i class="fa fa-user-edit"></i></a>
                              <a href="index.php?delete=<?php echo $row['id'] ?>" class="btn" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <?php
                              }
                            }
                          ?>
                        </tbody>
                      </table>
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