<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>
       .container {
            display: flex;
            align-items: center;
        }
        .admin {
            margin-left: 20px;
            color: #fff;
            text-justify: ;
        }
        .admin-container {
    display: flex;
    justify-content: center; /* Horizontally center align */
    align-items: center; /* Vertically center align */
    height: 100vh; /* Adjust the height as needed */
    margin-left: 50vh;
    margin-top: 0vh;
    margin-right: 50vh;
    margin-bottom: 10vh;
    padding-top: 0vh;
}
        .image {
            width: 25%;
            height: 255;
            padding-left: 10px;
            padding-top: 20px;
            padding-right: 80px;  
        }
        .card{
           margin-top: 20px;
           font-family: Georgia, 'Times New Roman', Times, serif;
           font-weight: bold;
           font-size: large;
           text-align: center;
        }
        .card-title{
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: large;
            text-align: ce;
        }
        .btn btn-primary{
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: large;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="nav">
        <div class="d-flex align-items-center">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech   SuperAdmin</h3>
        </div>
        <div class="menu">
            <ul class="listu">
                <a href="homeadmin.php"><li class="list">Home</li></a>
                <a href="index.php"><li class="list">User</li></a>
                <!--<a href="customer.php"><li class="list">Customers</li></a>
                <a href="offer.php"><li class="list">Offers</li></a-->
            </ul>
    </div>
        <!-- profile-->
        <div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">
                <a href="#">Edit Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
      </div>
         <!--<div>
            <a href="logout.php" class="btn btn-primary logout">Log out</a>
        </div>-->
   <!-- </div>-->
        <!--<div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">
                <a href="#">Edit Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
      </div>-->

        <!--<div class="profile-container">
            <img class="profile-image" src="profile.jpg" alt="Profile Picture" width="42px" height="42px">
            <div class="profile-dropdown">-->
               <!-- <center>
                <a href="logout.php" style="color:blue;" class="logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg>
                Logout</a>
                </center>-->
            </div>
      </div>
    </div>
    <!-- ****************card************* -->
    <!--<div class="content container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-title">Total Product</h5>
                    <p class="card-text">additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-title">Total Orders </h5>
                    <p class="card-text">additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>-->
    <!--<div class="container">-->
        
        <!--<div class="admin">
            <p>SkillTech is a leading online platform dedicated to providing top-tier technical courses tailored to meet the demands of today's rapidly evolving digital landscape. Our mission is to empower individuals with the skills and knowledge necessary to succeed in the ever-changing world of technology. At SkillTech, we pride ourselves on offering a diverse array of courses spanning various technical domains, including programming, cybersecurity, data science, cloud computing, and more.</p>
            <p>What sets SkillTech apart is our commitment to excellence in education. We collaborate with industry experts and educators to develop curriculum that is not only comprehensive but also highly relevant to real-world applications. Our courses are designed to be engaging, interactive, and practical, ensuring that learners acquire not only theoretical knowledge but also hands-on experience.</p>
            <p>Whether you're a beginner taking your first steps into the world of technology or a seasoned professional looking to expand your skill set, SkillTech has something for everyone. Our user-friendly platform makes learning convenient and accessible, allowing you to study at your own pace, anytime, anywhere. Join the SkillTech community today and embark on a journey of continuous learning and professional growth. Unlock your potential with SkillTech, where education meets innovation.</p>
        </div>
    </div>-->
</body>
</html>
