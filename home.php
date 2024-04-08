<?php
session_start();

if(!isset($_SESSION['email'])){
    header('location: login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="home.css">
 
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
    .bg-img > img{
      height: 90vh;
      width: 100%;
    }
    .bg-text{
      position: absolute;
      top: 22%;
      left: 7%;
    }
    .bg-text > h1{
      font-size: 50px;
    }
    .bg-text > p{
      font-size: larger;
      font-weight: 600;
      width: 650px;
      margin-top: 52px;
      padding-top: 10px;
    }
    .explore{
      position: absolute;
      top: 54%;
      left: 7%;
      border: 2px solid black;
      border-radius: 10px;
      padding: 8px;
      background-color: rgb(7, 87, 87);
    }
    .explore > a{
      text-decoration: none;
      color: white;
      font-size: large;
    }
    .explore > a > svg{
      margin-left: 6px;
    }
    .explore:hover{
      background-color: rgb(128, 184, 44);
    }
    .card-text{
      color: black;
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

  <!-- <center>
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="bg_1.jpg"  alt="..." height="450px" width="1000px">
        </div>
        <div class="carousel-item">
          <img src="bg_2.jpg"  alt="..." height="450px" width="1000px">
        </div>
        <div class="carousel-item">
          <img src="bg_5.jpg"  alt="..." height="450px" width="1000px">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </center> -->

    <div class="bg-img">
      <img src="WhatsApp Image 2024-03-30 at 5.15.19 PM.jpeg" alt="">
    </div>
    <div class="bg-text">
      <h1>Grow up you skills with <span style="color: cornflowerblue;">SkillTech</span></h1>
      <p>Learn about various technical skills. The latest online learning platform
        that help your knowledge growing.</p>
      </div>
    <div class="explore">
      <a href="categories.php">Explore now 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-circle-fill" viewBox="0 0 16 16">
          <path d="M0 8a8 8 0 1 0 16 0A8 8 0 0 0 0 8m5.904 2.803a.5.5 0 1 1-.707-.707L9.293 6H6.525a.5.5 0 1 1 0-1H10.5a.5.5 0 0 1 .5.5v3.975a.5.5 0 0 1-1 0V6.707z"/>
        </svg>
      </a>
    </div>

    <center>
      <h1 class="mt-4 mb-5" style="color: whitesmoke;">Our Services</h1>
    </center>

    <div class="items">
      <div class="card" style="width: 18rem;">
        <center>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-check-fill mt-3" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
          <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
        </svg>
        </center>
        <div class="card-body">
          <h4>Certified Teachers</h4>
          <p class="card-text">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic veniam, ad officiis ipsam sequi praesentium?</p>
        </div>
      </div>
    
      <div class="card" style="width: 18rem;">
        <center>
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-patch-check-fill mt-3" viewBox="0 0 16 16">
            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
          </svg>
        </center>
        <div class="card-body">
          <h4>Special Education</h4>
          <p class="card-text">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic veniam, ad officiis ipsam sequi praesentium?</p>
        </div>
      </div>
    
      <div class="card" style="width: 18rem;">
        <center>
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-book-half mt-3" viewBox="0 0 16 16">
            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
          </svg>
        </center>
        <div class="card-body">
          <h4>Book &amp; Library</h4>
          <p class="card-text">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic veniam, ad officiis ipsam sequi praesentium?</p>
        </div>
      </div>
      
      <div class="card" style="width: 18rem;">
        <center>
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-earmark-play-fill mt-3" viewBox="0 0 16 16">
            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M6 6.883a.5.5 0 0 1 .757-.429l3.528 2.117a.5.5 0 0 1 0 .858l-3.528 2.117a.5.5 0 0 1-.757-.43V6.884z"/>
          </svg>
        </center>
        <div class="card-body">
          <h4>Remote Learning</h4>
          <p class="card-text">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic veniam, ad officiis ipsam sequi praesentium?</p>
        </div>
      </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
