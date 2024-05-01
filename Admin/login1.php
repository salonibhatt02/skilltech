<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['passw'];

    $sql = "SELECT * FROM `adminuser` WHERE `mail` = '$email' AND `passw` = '$password'";
    $result = mysqli_query($conn, $sql);

    // while($row = mysqli_fetch_assoc($result)){
    // Check if a matching record is found
     if ($result) {
        header("Location: admin.php");
        session_start();
        $_SESSION['mail'] = $email;
        exit();
    } else {
        // Authentication failed
        // Display an error message using JavaScript alert
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
        header("Location: login.php?error=Incorrect User email or password");
    }
}
// }
mysqli_close($conn);
?>


