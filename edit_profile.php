<?php
    session_start();
    
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }

    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $password = $_POST["passw"];

        $session_email = $_SESSION['email'];
        
        $pass = password_hash($password, PASSWORD_BCRYPT);

        $updatequery = "UPDATE customers SET `name`='$name',`phone`='$phone',`password`='$pass' WHERE `email`='$session_email'";
        $query = mysqli_query($conn,$updatequery);

        if($query){
            echo '<script>alert("Profile edited successfully!");';
            echo 'window.location.href = "home.php";</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
        function show()
        {
            var passwordInput = document.getElementById("password");
            var eyeImage = document.getElementById("showimg1");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeImage.src = "open-eye.png";

            } else {
                passwordInput.type = "password";
                eyeImage.src = "close-eye.png";
            }
        }

        function show1() 
        {
            var passwordInput = document.getElementById("cpass");
            var eyeImage = document.getElementById("showimg2");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeImage.src = "open-eye.png";
            } else {
                passwordInput.type = "password";
                eyeImage.src = "close-eye.png";

            }
        }

        function validatePassword() {
            var name = document.getElementById('name').value;
                if (name == "") {
                    alert("Name must be filled out");
                    return false;
                }
            var letters = /^[A-Za-z\s]+$/;
                if (!letters.test(name)) {
                    alert("Name must contain only alphabetic characters");
                    return false;
                }
            var phoneInput = document.getElementById("phone").value;
            var phonePattern = /^\d{10}$/;
                if (!phonePattern.test(phoneInput)) {
                    alert("Please enter a valid 10-digit phone number.");
                    return false;
                }

            var passwordInput = document.getElementById("password").value;
            var confirmPasswordInput = document.getElementById("cpass").value;
                if (passwordInput != confirmPasswordInput) {
                    alert("Passwords do not match.");
                    return false;
                }

            var upperCaseLetters = /[A-Z]/g;
            var lowerCaseLetters = /[a-z]/g;
            var numbers = /[0-9]/g;

                if (
                    passwordInput.length >= 8 &&
                    passwordInput.length <= 12 &&
                    passwordInput.match(upperCaseLetters) &&
                    passwordInput.match(lowerCaseLetters) &&
                    passwordInput.match(numbers)
                ) {
                    return true;
                } else {
                    alert("Password must be 8-12 characters long and include at least one upperca   letter, one lowercase letter, and one number.");
                    return false;
                }
        }
    </script>
    <style>
        .form-container{
            width: 500px;
            color: black;
            margin-top: 30px;
            border: 2px solid white;
            padding: 20px;
            border-radius: 10px;
            position: absolute;
            top: 48%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: white;
        }
        .form-control{
            border: 1px solid black;
        }
        .form-container>h2{
            text-align: center;
        }
        .showimg{
            width: 20px;
            height: 20px;
            margin-left: 425px; 
            margin-top: -65px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="d-flex align-items-center">
            <img src="b6ea43e6-8f57-4472-bc6b-d27cd3921f1c.png" alt="Logo" width="60px" height="60px" class="logo">
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
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

    <div class="form-container">
        <h2>Edit Profile</h2>
        <form action="edit_profile.php" onsubmit="return validatePassword()" method="post">
            <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <label for="phone" class="form-label">Phone no :</label>
            <input type="text" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
            </div>
            <div class="mb-0">
            <label for="password" class="form-label">Password :</label>
            <input type="password" class="form-control" name="passw" id="password">
            <img src="close-eye.png" onclick="show()" class="showimg" id="showimg1">
            </div>
            <div class="mb-0">
            <label for="cpass" class="form-label">Confirm Password :</label>
            <input type="password" class="form-control" name="cpass" id="cpass">
            <img src="close-eye.png" onclick="show1()" class="showimg" id="showimg2">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>