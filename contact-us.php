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
    <title>contact us</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="contactus.css">
    <!-- <link rel="stylesheet" href="test.css"> -->
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <style>
        .nav{
    display: flex;
    justify-content: space-between;
    height: 70px;
    width: 100%;
    align-items: center;
    background-image: linear-gradient(to right, #93A5CF,#E4EfE9);
    position: fixed;
    }
    .logo{
        margin: 5px;
    }
    body{
        background-color: #282854;
    }
    .listu{
    list-style-type: none;
    display: inline;
    font-weight: bolder;
    margin-left: -125px;
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
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
body{
    font-family: 'Open Sans', sans-serif;
    line-height: 1.5;
}
.contact-bg{
    height: 53vh;
    background-color: #282854;
    background-position: 50% 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    text-align: center;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.contact-bg h3{
    font-size: 1.3rem;
    font-weight: 400;
}
.contact-bg h2{
    font-size: 3rem;
    text-transform: uppercase;
    padding: 0.4rem 0;
    letter-spacing: 4px;
}
.line div{
    margin: 0 0.2rem;
}
.line div:nth-child(1),
.line div:nth-child(3){
    height: 3px;
    width: 70px;
    background: #f7327a;
    border-radius: 5px;
}
.line{
    display: flex;
    align-items: center;
}
.line div:nth-child(2){
    width: 10px;
    height: 10px;
    background: #f7327a;
    border-radius: 50%;
}
.text{
    font-weight: 300;
    opacity: 0.9;
}
.contact-bg .text{
    margin: 1.6rem 0;
}
.contact-body{
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 1rem;
}
.contact-info{
    margin: 2rem 0;
    text-align: center;
    padding: 2rem 0;
}
.contact-info span{
    display: block;
}
.contact-info div{
    margin: 0.8rem 0;
    padding: 1rem;
}
.contact-info span .fas{
    font-size: 2rem;
    padding-bottom: 0.9rem;
    color: #f7327a;
}
.contact-info div span:nth-child(2){
    font-weight: 500;
    font-size: 1.1rem;
    color: aliceblue;
}
.contact-info .text{
    padding-top: 0.4rem;
    color: antiquewhite;
}
.contact-form{
    padding: 2rem 0;
    border-top: 1px solid #c7c7c7;
}
.contact-form form{
    padding-bottom: 1rem;
}
.form-control{
    width: 100%;
    border: 1.5px solid #c7c7c7;
    border-radius: 5px;
    padding: 0.7rem;
    margin: 0.6rem 0;
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    outline: 0;
}
.form-control:focus{
    box-shadow: 0 0 6px -3px rgba(48, 48, 48, 1);
}
.contact-form form div{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    column-gap: 0.6rem;
}
.send-btn{
    font-family: 'Open Sans', sans-serif;
    font-size: 1rem;
    text-transform: uppercase;
    color: #fff;
    background: #f7327a;
    border: none;
    border-radius: 5px;
    padding: 0.7rem 1.5rem;
    cursor: pointer;
    transition: all 0.4s ease;
}
.send-btn:hover{
    opacity: 0.8;
}
.contact-form > div img{
    width: 85%;
}
.contact-form > div{
    margin: 0 auto;
    text-align: center;
}
.contact-footer{
    padding: 2rem 0;
    background-color: #282854;
}
.contact-footer h3{
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 1rem;
    text-align: center;
}
.social-links{
    display: flex;
    justify-content: center;
}
.social-links a{
    text-decoration: none;
    width: 40px;
    height: 40px;
    color: #fff;
    border: 2px solid #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0.4rem;
    transition: all 0.4s ease;
}
.social-links a:hover{
    color: #f7327a;
    border-color: #f7327a;
}

@media screen and (min-width: 768px){
    .contact-bg .text{
        width: 70%;
        margin-left: auto;
        margin-right: auto;
    }
    .contact-info{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (min-width: 992px){
    .contact-bg .text{
        width: 50%;
    }
    .contact-form{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        align-items: center;
    }
}

@media screen and (min-width: 1200px){
    .contact-info{
        grid-template-columns: repeat(4, 1fr);
    }
}
/* .listu{
    list-style-type: none;
    display: inline;
    font-weight: bolder;
    margin-left: -125px;
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
} */
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
              <a href="courses.php"><li class="list">Home</li></a>
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



    <section class = "contact-section">
        <div class = "contact-bg">
          <h3>Get in Touch with Us</h3>
          <h2>contact us</h2>
          <div class = "line">
            <div></div>
            <div></div>
            <div></div>
          </div>
          <p class = "text">"Have a question or need assistance? Reach out to us—we're here to help!" </p>
        </div>
    
    
    
    
    
    <div class = "contact-body">
        <div class = "contact-info">
          <div>
            <span><i class = "fas fa-mobile-alt"></i></span>
            <span>Phone No.</span>
            <span class = "text">1-2392-23928-2</span>
          </div>
          <div>
            <span><i class = "fas fa-envelope-open"></i></span>
            <span>E-mail</span>
            <span class = "text">mail@company.com</span>
          </div>
          <div>
            <span><i class = "fas fa-map-marker-alt"></i></span>
            <span>Address</span>
            <span class = "text">2939 Patrick Street, Vicotria TX, United States</span>
          </div>
          <div>
            <span><i class = "fas fa-clock"></i></span>
            <span>Opening Hours</span>
            <span class = "text">Monday - Friday (9:00 AM to 5:00 PM)</span>
          </div>
        </div>



        <div class = "contact-form">
            <form action="https://api.web3forms.com/submit" method="POST">
                <input type="hidden" name="access_key" value="9d5955d0-f647-4827-9888-845632eb2824">
                <div>
                  <input type = "text" class = "form-control" name="name" placeholder="Full Name">
                  <input type = "text" class = "form-control" name="query" placeholder="Query Title">
                </div>
                <div>
                  <input type = "email" class = "form-control" name="email" placeholder="E-mail">
                  <input type = "text" class = "form-control" name="phone" placeholder="Phone">
                </div>
                <textarea rows = "5" placeholder="Message" name="message" class = "form-control"></textarea>
                <input type = "submit" class = "send-btn" name="submit" value = "send message">
              </form>


            <div>
                <img src = "laptop.png" alt = "pic">
              </div>
            </div>
          </div>


          <div class = "contact-footer">
            <h3>Follow Us</h3>
            <div class = "social-links">
              <a href = "#" class = "fab fa-facebook-f"></a>
              <a href = "#" class = "fab fa-twitter"></a>
              <a href = "#" class = "fab fa-instagram"></a>
              <a href = "#" class = "fab fa-linkedin"></a>
              <a href = "#" class = "fab fa-youtube"></a>
            </div>
          </div>

        </section>

  

    

    







    
</body>
</html>

<!-- hello -->

<!-- hello -->