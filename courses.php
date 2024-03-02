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
    <title>Home Page</title>
    
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
        }
        .card{ */
            /* display: flex; */
            /* margin: 20px; */
            /* height: 500px; */
            /* width: 600px; */
        /* }
        .card-title{
            display: inline;
        }
        .card-price{
            margin-left: 170px;
            font-weight: 600;
            font-size: larger
        }
        .listu{
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
                <center>
                <a href="logout.php" style="color:blue;" class="logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
                Logout</a>
                </center>
            </div>
      </div>
    </div>

    <div class="cnt">
    <?php
        include 'connect.php';
        // echo "welcome" . $_SESSION['email'];

        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);    

        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='card' style='width: 22rem;'>
                    <img src='product-img\/".$row['image']."' class='card-img-top' alt='...' height='220px' width='150px'>
                    <div class='card-body'>
                    <h5 class='card-title'>" . $row['title'] . "</h5> 
                    <span class='card-price'>Rs. " . $row['price'] . "</span>
                    <p class='card-text'>" . $row['description'] . "</p>
                    <center>
                    <a href='a' class='btn btn-primary'>BUY NOW</a>
                    </center>
                    </div>
                </div>";
        }
    ?>

        <!-- //   <div class="card" style="width: 18rem;">
        //     <img src="..." class="card-img-top" alt="..." height="250px" width="200px">
        //     <div class="card-body">
        //       <h5 class="card-title">Card title</h5> 
        //       <span class="card-price">Rs. 500</span>
        //       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        //       <center>
        //       <a href="#" class="btn btn-primary">Go somewhere</a>
        //       </center>
        //     </div>
        //   </div>
        //   <div class="card" style="width: 18rem;">
        //     <img src="..." class="card-img-top" alt="..." height="250px" width="200px">
        //     <div class="card-body">
        //       <h5 class="card-title">Card title</h5>
        //       <span class="card-price">Rs. 500</span>
        //       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        //       <center>
        //       <a href="#" class="btn btn-primary">Go somewhere</a>
        //       </center>
        //     </div>
        //   </div> -->
    </div>
</body>
</html>