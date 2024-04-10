<?php
// session_start();

// if(!isset($_SESSION['email'])){
//     header('location: login.php');
// }

session_start();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit; // Stop further execution
}

if (!isset($_GET['amount']) || !isset($_GET['title'])) {
    // If the required parameters are not provided, handle the error
    echo "Error: Missing parameters.";
    exit; // Stop further execution
}

$amount = $_GET['amount'];

// $title = $_GET['title'];

// Use $amount and $title to generate the payment link or perform any other necessary actions
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="home.css">
  <style>
    .course-card {
    background-color: white;
    border: 1px solid #ccc;
    padding: 20px;
    width: 350px;
    text-align: center;
    margin-bottom: 20px;
    margin-right: 230px;
    margin-top: 150px;
    float: right;
  }

  .course-card > hr{
    margin: 6px;
  }
  
  .course-card img {
    width: 100%;
    height: 150px;
    border-radius: 5px;
    object-fit: contain;
    /* margin-bottom: 20px; */
  }
  .cancel-pl{
    margin-top: -80px;
    margin-left: -335px;
  }
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
      
      <div class="welcome">
            <h5><?php echo "Welcome, " . $_SESSION['name'] ?></h5>
      </div>
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
  <?php
    include 'connect.php';
    // echo "welcome" . $_SESSION['email'];

    $link_purpose = $_GET['title'];
    // echo "var_dump($link_purpose)";
    // $link_id = $_GET['link_id'];

    $sql = "SELECT * FROM product WHERE `title` = '$link_purpose'";
    $result = mysqli_query($conn, $sql);    

   
        while($row = mysqli_fetch_assoc($result)){
            ?>

<!-- <div class='card'>
                    <div class='image'>
                        <img src='product-img/<?php echo $row['image'] ?>' alt='' height='' width='250px'>
                    </div>
                    <div class='card-body'>
                        <h3 class='card-title'><?php echo $row['title'] ?></h3>
                        <p class='card-text'><?php echo $row['description'] ?></p>
                        <p class='card-price'>Rs. <?php echo $row['price'] ?></p>
                        </div>
                </div> -->
                <div class="course-card">
                    <img src='product-img/<?php echo $row['image'] ?>' alt="Course Image 1">
                    <hr>
                    <h2><?php echo $row['title'] ?></h2>
                    <p><?php echo $row['categories'] ?></p>
                    <p>Rs. <?php echo $row['price'] ?></p>
                </div>
           

  
  <!-- <iframe src="create_pl.php?amount=" name="abc" width="100%" height="550" style="border:none;">
</iframe> -->

                        <iframe src="create_pl.php?amount=<?php echo $row['price']; ?>&title=<?php echo urlencode($row['title']); ?>" name="abc" width="50%" height="600" style="border:none;margin-top:30px;"></iframe>


<!-- &link_id= echo $link_id;  -->
<!-- <button type="button" class="btn btn-primary" > CANCEL </button> -->
<a href="cancel_pl.php" class="btn btn-primary cancel-pl">CANCEL</a>



<?php } ?>

<!-- <script>
  window.onload = function() {
    console.log("Page loaded"); 
    // Select the elements you want to style on the linked page
    var elementsToStyle = document.getElementsByClassName('payment-info');

    // Apply CSS styles to each selected element
    for (var i = 0; i < elementsToStyle.length; i++) {
      elementsToStyle[i].style.display = 'none'; // Replace property and value with your desired CSS
    }
  };
</script> -->



    </body>
    </html>
