<?php
session_start();

if(!isset($_SESSION['email'])){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="test.css"> -->
    <style>
        .nav{
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
    }
    .about-us{
        color: whitesmoke;
        width: 600px;
        position: absolute;
        left: 50%;
        top: 55%;
        transform: translate(-50%,-50%);
        text-align: justify;
    }
    .about-us > h1{
        text-align: center;
        margin-bottom: 25px;
    }
    #about-us-bg{
        height: 100%;
        width: 100%;
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

        /* .profile-container:hover .profile-dropdown {
            display: block;
        } */
        .logout{
            font-weight: bolder;
        }
        .welcome{
            position: absolute;
            right: 72px;
        }
        hr{
            margin: 0.5rem 0;
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
                <a href="#">My Courses</a>
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
    
        <img src="aboutusbg.png" alt="bg-img" id="about-us-bg">

    <div class="about-us">
        <h1>About Us</h1>
        <p>SkillTech is a leading online platform dedicated to providing top-tier technical courses tailored to meet the demands of today's rapidly evolving digital landscape. Our mission is to empower individuals with the skills and knowledge necessary to succeed in the ever-changing world of technology. At SkillTech, we pride ourselves on offering a diverse array of courses spanning various technical domains, including programming, cybersecurity, data science, cloud computing, and more. <br>
<br>
            What sets SkillTech apart is our commitment to excellence in education. We collaborate with industry experts and educators to develop curriculum that is not only comprehensive but also highly relevant to real-world applications. Our courses are designed to be engaging, interactive, and practical, ensuring that learners acquire not only theoretical knowledge but also hands-on experience.
            <br>
            <br>
            Whether you're a beginner taking your first steps into the world of technology or a seasoned professional looking to expand your skill set, SkillTech has something for everyone. Our user-friendly platform makes learning convenient and accessible, allowing you to study at your own pace, anytime, anywhere. Join the SkillTech community today and embark on a journey of continuous learning and professional growth. Unlock your potential with SkillTech, where education meets innovation.
            
    </div>
    
    







    
</body>
</html>