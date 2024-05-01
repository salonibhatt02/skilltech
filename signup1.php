<?php
    // include 'signup.php';
    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST["name"];
        $email = $_POST["mail"];
        $phone = $_POST["phone"];
        $password = $_POST["passw"];
        $role = "user";

        $pass = password_hash($password, PASSWORD_BCRYPT);

        $emailquery = "SELECT * FROM customers where email = '$email' ";
        $query = mysqli_query($conn,$emailquery);
        // var_dump($query);
        $emailcount = mysqli_num_rows($query);

        if($emailcount > 0){
            // echo '<script language="javascript">';
            // echo 'alert(Email already exist)';
            // echo '</script>';
            // echo '<script language="javascript">';
            // echo 'alert("Email already exists");'; // Corrected syntax
            // echo '</script>';
            // header('location: signup.php');
            // echo '<script>alert("Email already exist");</script>';
            // exit();

            echo '<script>alert("Email already exists");';
            echo 'window.location.href = "signup.php";</script>';
            exit();
          
        }
    
        else{
        // }
        $sql = "INSERT INTO `customers`(`name`,`email`,`phone`,`password`,`role`) VALUES ('$name','$email','$phone','$pass','$role')";

        $result = mysqli_query($conn, $sql);

        if(!$result)
        {
        echo "Error in data insertion : " . mysqli_error($conn);
        }
        else{
        // echo "data inserted successful";
            header('location: home.php');
        }
    }
    }


    
?>