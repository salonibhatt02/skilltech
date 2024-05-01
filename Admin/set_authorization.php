<?php

session_start();
if(!isset($_SESSION['mail'])){
    header("Location: ../login.php");
}

    include ('connect.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $clientid = $_POST['clientid'];
        $clientsecret = $_POST['clientsecret'];

        $cipher = "AES-256-CBC";
        $encryption_key = '123456789012345678901234567890012';
        $options = 0;
        $iv = str_repeat("0",openssl_cipher_iv_length($cipher));

        $encrypted_clientid = openssl_encrypt($clientid, $cipher, $encryption_key, $options, $iv);

        // Encrypt clientsecret
        $encrypted_clientsecret = openssl_encrypt($clientsecret, $cipher, $encryption_key, $options, $iv);

        $sql = "SELECT * FROM `authorizations`";
        $result = mysqli_query($conn,$sql);

        if($result){
            $rowcount = mysqli_num_rows($result);

            if($rowcount == 0){
                $sql1 = "INSERT INTO `authorizations`(`clientid`,`clientsecret`) VALUES ('$encrypted_clientid','$encrypted_clientsecret')";
                $result1 = mysqli_query($conn,$sql1); 

                if($result1){
                    // echo "<script>alert('Authorization has been set');</script>";
                    header("Location: admin.php");
                    exit;
                }
            }
            else{
                $sql2 = "UPDATE `authorizations` SET `clientid`='$encrypted_clientid' , `clientsecret`='$encrypted_clientsecret'";
                $result2 = mysqli_query($conn,$sql2);

                if($result2){
                    // echo "<script>alert('Authorization has been updated');</script>";
                    header("Location: admin.php");
                    exit;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Authorization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
        .container{
            width: 500px;
            background-color: white;
            border-radius: 15px;
            padding: 20px 30px 30px 30px;
            margin-top: 15vh;
            box-shadow: 4px 4px 4px 4px black;
        }
        h2{
            text-align: center;
        }
        label{
            font-size: medium;
            font-weight: 600;
        }
        form{
            margin-top: 25px;
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
                <p>Hi, <?php echo $_SESSION['aname'] ?></p>
                <a href="set_authorization.php">Set Authorization</a>
                <!--<a href="#">Settings</a>-->
                <a href="logout.php">Logout</a>
            </div>
      </div>
    </div> 
    
    <div class="container ">
        <h2>Set Authorization</h2>
        <form action="" method="post" autocomplete="off">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label">x-client-id :</label>
              <input type="text" class="form-control" name="clientid">
            </div>
            <div class="mb-4">
              <label for="exampleInputPassword1" class="form-label">x-client-secret :</label>
              <input type="text" class="form-control" name="clientsecret">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>
</html>