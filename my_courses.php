<?php
    session_start();
    
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    include 'fetch_test.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="courses.css">
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
  <style>
        .profile-dropdown hr{
            margin: 0.5rem 0;
        }
        .course-card{
            width: 334px;
        }
  </style>
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
        <div class="welcome">
              <h5><?php echo "Welcome, " . $_SESSION['name'] ?></h5>
        </div>
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px" onclick="display()">
            <div class="profile-dropdown" id="dropdown">
                <p><?php echo "Hi, " . $_SESSION['name'] ?></p>
                <a href="my_courses.php">My Courses</a>
                <hr>
                <a href="edit_profile.php">Edit Profile</a>
                <hr>
                <a href="transactions.php">Transactions</a>
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
    <div class="course-card-container">

        <?php
            include 'connect.php';
            // echo "welcome" . $_SESSION['email'];

            $session_email = $_SESSION['email'];
            // $sql = "SELECT * FROM product WHERE `categories` = 'Web Development'";
            $sql = "SELECT * FROM product INNER JOIN fetch_pl_details ON product.title = fetch_pl_details.link_purpose WHERE fetch_pl_details.link_status = 'paid' AND fetch_pl_details.customer_email = '$session_email'";
            $result = mysqli_query($conn, $sql);    

            while($row = mysqli_fetch_assoc($result)){
                ?>
                    <div class="course-card">
                        <img src='product-img/<?php echo $row['image'] ?>' alt="Course Image 1">
                        <hr>
                        <center>
                        <h2><?php echo $row['title'] ?></h2>
                        <p><?php echo $row['categories'] ?></p>
                        <button type="button" class="">View</button>
                        </center>
                    </div>
                    
                    
                <?php 
                    }
                ?>
                </div>
                </div>
</body>
</html>