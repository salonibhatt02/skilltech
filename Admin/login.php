<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">


    <style>
        .error {
   /* background: #F2DEDE; */
   color: red;
   /* padding: 10px; */
   width: 70%;
   /* border-radius: 5px; */
   margin: 10px auto;
   /* margin-bottom: 10px; */
   text-align: center;
}

.login-form{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: aliceblue;
    border: 2px solid grey;
    border-radius: 10px;
    height: 360px;
    width: 400px;
}
.login-inputs{
    margin-top: 25px;
    margin-left: 25px;
    margin-right: 25px;
    margin-bottom: 0px;
}
    </style>
    <script>
        function show(){
            var passwordInput = document.getElementById("pass");
            var eyeImage = document.getElementById("showimg1");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeImage.src = "open-eye.png";
            } else {
                passwordInput.type = "password";
                eyeImage.src = "close-eye.png";

            }
        }
        function loginValid()
        {
            let mail = document.forms["login-form"]["mail"].value;
            let pass = document.forms["login-form"]["pass"].value;

            if(pass == ""){
                alert("Email and Password should not be empty.");
                return false;
            }
            if(mail == ""){
                alert("Email and Password should not be empty.");
                return false;
            }

            }
        
    </script>
</head>
<body class="login-body">
    
    <div class="nav">
        <div class="d-flex align-items-center">
            <img src="logo.png" alt="Logo" width="60px" height="60px" class="logo">
            <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
        </div>
            <div>
                <h3>Admin</h3>
            </div>
        <!--<div>
            <h3>Admin</h3>
        </div>-->
        <!--<div class="buttons">
            <a href="signup.php" class="btn btn-primary">Sign up</a>
        </div>-->
    </div>

    <!-- <div class="login-body"> -->
    <img src="login-bg-img.png" alt="" class="bg-img">
    <!-- </div> -->

    <div class="login-form">
        <h2>Login</h2>
        
        <form action="login11.php" name="login-form" autocomplete="off" onsubmit="return loginValid()" method ="POST">
        <div class="login-inputs">
            <label for="uname">Email:</label> <br>
            <input type="email" name="mail" id="uname" placeholder="abc@gmail.com" > <br>

            <label for="pass">Password:</label> <br>
            <div class="password-container">
            <input type="password" name="passw" id="pass" placeholder="Enter Password" ><br>
            <img src="close-eye.png" onclick="show()" class="showimg" id="showimg1">
            </div>
            <!-- <div class="hide">
                <input type="checkbox" name="" id="check" onclick="see()"><span style="margin-left: 5px;" id="span">Show</span>
            </div> -->
        </div>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        <center>
        <input type="submit" value="Login" id="submit" class="btn btn-primary"><br>
        </center>
    </form>
    </div>
</body>
</html>