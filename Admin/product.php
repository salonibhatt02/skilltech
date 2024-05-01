<?php
include('connect.php');
$upload_dir = 'uploads/';

session_start();
if(!isset($_SESSION['mail'])){
    header("Location: ../login.php");
}
// Delete product if requested
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "SELECT * FROM product WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
        unlink($upload_dir.$image);
        $sql = "DELETE FROM product WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)){
            header('location:product.php');
            exit;
        }
    }
}

// Search functionality
if(isset($_POST['search'])){
    $search_query = $_POST['search_query'];
    $sql = "SELECT * FROM `product` WHERE `title` LIKE '%$search_query%' OR `categories` LIKE '%$search_query%' OR `description` LIKE '%$search_query%' OR `price` LIKE '%$search_query%' OR `videos` LIKE '%$search_query%' OR `duration` LIKE '%$search_query%' OR `lecturer` LIKE '%$search_query%'";
    $result = mysqli_query($conn,$sql);
    // $stmt = mysqli_prepare($conn, $sql);
    // $search_param = "%$search_query%";
    // mysqli_stmt_bind_param($stmt, "ssss", $search_param, $search_param, $search_param, $search_param);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);
} else {
    // Default query to fetch all products
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DisplayProduct</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
    /* .navbar-toggler{
        background-color: black;
    } */
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
    .ms-auto{
        margin-right: 10px;
    }
    /* .listu{
        margin-left: 60px;
    } */
    .search{
        border: none;
        color: white;
        padding: 5px 6px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 3px 2px;
        cursor: pointer;
        font-weight: bolder;
        background-color: #282854;
    }
    </style>
</head>
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
                <p>Hi, <?php echo $_SESSION['aname']?></p>
                <a href="set_authorization.php">Set Authorization</a>
                <!--<a href="#">Settings</a>-->
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="navbar navbar-expand-md navbar-light navbar-laravel">
                            <a class="navbar-brand" href="index.php"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <form class="d-flex ms-auto" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <input class="searchbar" type="search" placeholder="Search" aria-label="Search" name="search_query">
                                        <button class="search" type="submit" name="search">Search</button>
                                    </form><br>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="create.php" style="margin-right: 15px;">
                                            <i class="fa fa-user-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Price</th>
                                        <th>Videos</th>
                                        <th>Duration</th>
                                        <th>Lecturer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 0;
                                    if(mysqli_num_rows($result)){
                                        while($row = mysqli_fetch_assoc($result)){
                                        $id ++;
                                    ?>
                                    <tr>
                                        <td class="tr"><?php echo $id ?></td>
                                        <td class="tr"><img src='\skilltech\product-img\<?php echo $row['image'] ?>' height="50" width="50"></td>
                                        <td class="tr"><?php echo $row['title'] ?></td>
                                        <td class="tr"><?php echo $row['categories'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td class="tr"><?php echo $row['videos'] ?></td>
                                        <td class="tr"><?php echo $row['duration'] ?></td>
                                        <td class="tr"><?php echo $row['lecturer'] ?></td>
                                        <td class="text-center">
                                            <a href="show.php?id=<?php echo $row['id'] ?>" class="btn"><i class="fa fa-eye"></i></a>
                                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn"><i class="fa fa-user-edit"></i></a>
                                            <a href="product.php?delete=<?php echo $row['id'] ?>" class="btn" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
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
