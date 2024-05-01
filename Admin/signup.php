
<?php
    include 'signup1.php';
    include 'connect.php';
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign up</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="index.css">

            <script>

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
                        var email = document.getElementById('email').value;
                            if (email == "") {
                                alert("Email must be filled out");
                                return false;
                            }
                            var letters = /^[A-Za-z]+$/;
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
                            alert("Password must be 8-12 characters long and include at least one uppercase letter, one lowercase letter, and one number.");
                            return false;
                        }

                        // let mail = document.forms["signup-form"]["mail"].value;
                        // if(mail == ""){
                        //     alert("Email and Password should not be empty.");
                        //     return false;
                        // }
                        // let pass = document.forms["signup-form"]["password"].value;

                        // if(pass == ""){
                        //     alert("Email and Password should not be empty.");
                        //     return false;
                        // }

                    //     var phoneInput = document.getElementById("phone").value;
                    // var phonePattern = /^\d{10}$/;

                    // if (phonePattern.test(phoneInput)) {
                    //     return true;
                    // } else {
                    //     alert("Please enter a valid 10-digit phone number.");
                    //     return false;
                    // }
                    }
            


            </script>
        </head>
        <body >
        <body class="login-body">
            <div class="nav">
                <div class="d-flex align-items-center">
                    <img src="b6ea43e6-8f57-4472-bc6b-d27cd3921f1c.png" alt="Logo" width="60px" height="60px" class="logo">
                    <h3 style="font-family: Georgia, 'Times New Roman', Times, serif;">SkillTech</h3>
                </div>
                <div class="buttons">
                    <a href="login.php" class="btn btn-primary">Log in</a>
                </div>
            </div>

            <img src="login-bg-img.png" alt="" class="bg-img">

            <div class="signup-form">
                <h2>Sign up</h2>
                <form action="" onsubmit="return validatePassword()" method="post" name="signup-form">
                    <div class="signup-inputs">
                        <label for="name">Name:</label> <br>
                        <input type="text" name="name" id="name" placeholder="John Doe" class="signup-input-type" required> <br>

                        <label for="email">Email:</label> <br>
                        <input type="email" name="mail" id="email" placeholder="abc@gmail.com" class="signup-input-type"> <br>
            
                        <label for="phone">Phone no:</label> <br>
                        <input type="text" name="phone" id="phone" placeholder="9999999999" class="signup-input-type"> <br>

                        <label for="pass">Password:</label> <br>
                        <div class="password-container">
                        <input type="password" name="passw" id="password" placeholder="Enter Password" class="signup-input-type">
                        <img src="close-eye.png" onclick="show()" class="showimg" id="showimg1">
                        </div>

                        <label for="cpass">Confirm Password:</label> <br>
                        <input type="password" name="passw" id="cpass" placeholder="Re-Enter Password" class="signup-input-type">
                        <img src="close-eye.png" onclick="show1()" class="showimg" id="showimg2">
                        <br>
                    </div>
                    <center>
                        <input type="submit" value="Signup" id="signup-submit" class="btn btn-primary"><br>
                    </center>
                </form>
            </div>
        </body>
        </html>