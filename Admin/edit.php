<?php
require_once('connect.php');
$upload_dir = 'uploads/';

session_start();
if(!isset($_SESSION['mail'])){
    header("Location: ../login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    // $stmt = mysqli_prepare($conn, $sql);
    // mysqli_stmt_bind_param($stmt, "i", $id);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $errorMsg = 'Could not find any record';
    }
}

if (isset($_POST['Submit'])) {
    $name = $_POST['title'];
    $description = $_POST['description'];
    $categories = $_POST['categories'];
    $price = $_POST['price'];
	  $videos = $_POST['videos'];
	  $duration = $_POST['duration'];
	  $lecturer = $_POST['lecturer'];
      $userPic = $_POST['image'];

    // $imgName = $_FILES['image']['name'];
    // $imgTmp = $_FILES['image']['tmp_name'];
    // $imgSize = $_FILES['image']['size'];

    // if ($imgName) {
    //     $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
    //     $allowExt = array('jpeg', 'jpg', 'png', 'gif');
    //     $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;

    //     if (in_array($imgExt, $allowExt)) {
    //         if ($imgSize < 5000000) {
    //             unlink($upload_dir . $row['image']);
    //             move_uploaded_file($imgTmp, $upload_dir . $userPic);
    //         } else {
    //             $errorMsg = 'Image too large';
    //         }
    //     } else {
    //         $errorMsg = 'Please select a valid image';
    //     }
    // } else {
    //     $userPic = $row['image'];
    // }
    // if (!isset($errorMsg)) {
        // $sql = "UPDATE product
        //         SET name=?, description=?, categories=?, price=?, videos=?, duration=?, lecturer=?,image=?
        //         WHERE id=?";
        $sql = "UPDATE product SET `title`='$name',`categories`='$categories',`price`='$price',`videos`='$videos',`duration`='$duration',`lecturer`='$lecturer',`image`='$userPic' WHERE `id`='$id'";
        // $stmt = mysqli_prepare($conn, $sql);
        // mysqli_stmt_bind_param($stmt, $name, $description, $categories,$price, $videos, $duration, $lecturer,$userPic, $id);
        // $result = mysqli_stmt_execute($stmt);
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $successMsg = 'Record updated successfully';
            header('Location: product.php');
            exit;
        } else {
            $errorMsg = 'Error ' . mysqli_error($conn);
        }
    }
// }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
        .container {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
            margin-top: 20px;
        }

        .form-group {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
        }

        .btn {
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

        .form-group {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: large;
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <div class="container">
                        <a class="navbar-brand" href="product.php">Edit Product</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto"></ul>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a class="btn btn-outline-danger" href="product.php"><i
                                                class="fa fa-sign-out-alt">Back</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (isset($errorMsg)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errorMsg; ?>
                        </div>
                    <?php } ?>
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <label for="name">Title:</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Name"
                                   value="<?php echo isset($row['title']) ? $row['title'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" name="description" placeholder="Enter Description"
                                   value="<?php echo isset($row['description']) ? $row['description'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories:</label>
                            <!-- <input type="text" class="form-control" name="categories"
                                   placeholder="Choose Categories"
                                   value="<?php echo isset($row['categories']) ? $row['categories'] : ''; ?>"> -->
                            <select name="categories" id="">
                            <option value="Web Development">Web Development</option>
                            <option value="Designing">Designing</option>
                            <option value="Android Development">Android Development</option>
                            <option value="Analysis">Analysis</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Price"
                                   value="<?php echo isset($row['price']) ? $row['price'] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="videos">Videos:</label>
                            <input type="number" class="form-control" name="videos" placeholder="Enter Price"
                                   value="<?php echo isset($row['videos']) ? $row['videos'] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration:</label>
                            <input type="number" class="form-control" name="duration" placeholder="Enter Duration"
                                   value="<?php echo isset($row['duration']) ? $row['duration'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lecturer">Lecturer:</label>
                            <input type="text" class="form-control" name="lecturer" placeholder="Enter Lecturer Name"
                                   value="<?php echo isset($row['lecturer']) ? $row['lecturer'] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <div class="col-md-4">
                                <!-- <img src="<?php echo $upload_dir . (isset($row['image']) ? $row['image'] : ''); ?>"
                                     width="100"> -->
                                <img src='\skilltech\product-img\<?php echo $row['image'] ?>' alt="" width="100">
                                <input type="file" value="<?php echo $row['image'] ?>" class="form-control" name="image" accept="image/png, image/jpeg" value="">
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
