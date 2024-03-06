<?php
    session_start();
    
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="courses.css">
    <style>
        /* .nav{
            display: flex;
            justify-content: space-between;
            height: 70px;
            align-items: center;
            background-image: linear-gradient(to right, #93A5CF,#E4EfE9);
            position: sticky;
        }
        .logo{
            margin: 5px;
        }
        body{
            background-color: #282854;
            height: 100%;
            width: 100%;
        }
        .cnt{
            display: flex;
        } */
        /* .card{ 
             display: flex; 
            margin: 20px; 
             height: 500px; 
             width: 600px; 
         }
        .card-title{
            display: inline;
        }
        .card-price{
            margin-left: 170px;
            font-weight: 600;
            font-size: larger
        } */
        /* .listu{
            list-style-type: none;
            display: inline;
            font-weight: bolder;
            margin-left: -140px;
        }
        .listu > a{
            text-decoration: none;
        }
        .listu > a:hover{
            text-decoration: underline;
        }
        .list{
            padding-left: 15px;
            display: inline;
            font-size: large;
            cursor: pointer;
            color: black;
        }
        .logout{
            margin-right: 12px;
        }
        .profile-container {
            position: relative;
            display: inline-block;
            margin-right: 12px;

        }

        .profile-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            display: none;
        }

        .profile-dropdown a{
            color: #000000;
            width: 200px;
            padding: 2px 8px;
            text-decoration: none;
            display: block;
        }
        .profile-dropdown p{
            padding: 2px 8px;
            font-weight: bolder;
        }

        .profile-image {
            border-radius: 50%;
            cursor: pointer;
        }

        .profile-container:hover .profile-dropdown {
            display: block;
        }
        .logout{
            font-weight: bolder;
        } 
        .card-container{
          display: flex;
          flex-wrap: wrap;
        }
        .card{
            margin: 19px;
            width: 720px;
            display: flex;
            flex-direction: row;
            height: 320px;
        }
        .card-price{
          font-size: larger;
          font-weight: bolder;
        }
        .image > img{
          height: 316px;
          object-fit: cover;
        }
        .card-title{
          font-weight: bolder;
        }
        .card-text{
          height: 150px;
          overflow: auto;
        } */
        
    </style>
    <script>
        function display(){
            var dropdown = document.getElementById("dropdown");

            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }
    </script>
</head>
<body>
    <div class="nav">
        <div class="d-flex align-items-center">
            <img src="b6ea43e6-8f57-4472-bc6b-d27cd3921f1c.png" alt="Logo" width="60px" height="60px" class="logo">
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
        </div>
        <div class="menu">
            <ul class="listu">
                <a href="home.php"><li class="list">Home</li></a>
                <a href="categories.php"><li class="list">Courses</li></a>
                <a href="aboutus.php"><li class="list">About us</li></a>
                <a href="contact-us.php"><li class="list">Contact us</li></a>
            </ul>
        </div>
        <!-- <div>
            <a href="logout.php" class="btn btn-primary logout">Log out</a>
        </div> -->
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px" onclick="display()">
            <div class="profile-dropdown" id="dropdown">
                <p><?php echo "Hi, " . $_SESSION['name'] ?></p>
                <a href="#">My Courses</a>
                <hr>
                <!-- <center> -->
                <a href="logout.php" style="color:blue;" class="logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
                Logout</a>
                <!-- </center> -->
            </div>
      </div>
    </div>

    <div class="cnt">
    <div class="card-container">

    <?php
        include 'connect.php';
        // echo "welcome" . $_SESSION['email'];

        $sql = "SELECT * FROM product WHERE `categories` = 'analysis'";
        $result = mysqli_query($conn, $sql);    

        while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class='card'>
                    <div class='image'>
                        <img src='product-img/<?php echo $row['image'] ?>' alt='' height='' width='250px'>
                    </div>
                    <div class='card-body'>
                        <h3 class='card-title'><?php echo $row['title'] ?></h3>
                        <p class='card-text'><?php echo $row['description'] ?></p>
                        <p class='card-price'>Rs. <?php echo $row['price'] ?></p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                           BUY NOW
                        </button>
                    </div>
                </div>
            <?php
                }
            ?>


        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>