<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['passw'];

    // Prepare a SQL statement
    $sql = "SELECT * FROM `adminuser` WHERE `mail` = ? AND `passw` = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Store the result
    mysqli_stmt_store_result($stmt);

    // Check if any rows were returned
    if (mysqli_stmt_num_rows($stmt) > 0) {
        session_start();
        $_SESSION['mail'] = $email;
        header("Location: admin.php");
        exit();
    } else {
        // Authentication failed
        // Display an error message using JavaScript alert
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
        header("Location: login.php?error=Incorrect email or password");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
