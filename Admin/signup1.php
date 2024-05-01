<?php
    // include 'signup.php';
    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST["name"];
        $email = $_POST["mail"];
        $phone = $_POST["phone"];
        $password = $_POST["passw"];

        // Sanitize user input
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $phone = mysqli_real_escape_string($conn, $phone);

        // Hash the password
        $pass = password_hash($password, PASSWORD_BCRYPT);

        // Check if email already exists
        $emailquery = "SELECT * FROM signup where mail = '$email' ";
        $query = mysqli_query($conn,$emailquery);
        $emailcount = mysqli_num_rows($query);

        if($emailcount > 0){
            echo '<script language="javascript">';
            echo 'alert("Email already exists");';
            echo '</script>';
        } else {
            // Proceed with inserting user data
            $sql = "INSERT INTO `signup`(`name`,`mail`,`phone`,`passw`) VALUES ('$name','$email','$phone','$pass')";
            $result = mysqli_query($conn, $sql);

            if(!$result) {
                echo "Error in data insertion : " . mysqli_error($conn);
            } else {
                // Redirect to home page
                header('location: login.php');
                exit(); // Ensure script stops execution after redirection
            }
        }
    }
?>
