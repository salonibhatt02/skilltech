
 <?php
 session_start();
include 'connect.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];
    $password = $_POST['passw'];

    
    $sql = "SELECT * FROM customers where email = '$email' ";
    $result = mysqli_query($conn,$sql);
    $emailcount = mysqli_num_rows($result);

    if($emailcount){
        $email_pass = mysqli_fetch_assoc($result);

        $db_pass = $email_pass['password'];

        $pass_decode = password_verify($password, $db_pass);
        $name = $email_pass['name'];
        $phone = $email_pass['phone'];
        $role = $email_pass['role'];
            if($pass_decode && $role == "user"){
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['phone'] = $phone;
                header("Location: home.php");
                exit();    
            }
            elseif($pass_decode && $role == "admin"){
                $_SESSION['mail'] = $email;
                $_SESSION['aname'] = $name;
                $_SESSION['aphone'] = $phone;
                header("Location: Admin\admin.php");
                exit();    
            }
            else{
                header("Location: login.php?error=Incorrect User email or password");
            }
        }
        else{
            header("Location: login.php?error=Incorrect User email or password");
        }
    }
    // Query to check if the email and password match
    // $sql = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    // $result = mysqli_query($conn, $sql);

    // Check if a matching record is found
    //  if (mysqli_num_rows($result) == 1) {
    //     $_SESSION['email'] = $email;
        // if(is_array($result)){
        //     $_SESSION['mail'] = $result['mail'];
        //     $_SESSION['passw'] = $result['passw'];
        
        // Authentication successful
        // Redirect the user to the home page or perform other actions
    //     header("Location: home.php");
    //     exit();
    // } else {
        // Authentication failed
        // Display an error message using JavaScript alert
        // echo "<script>alert('Invalid email or password. Please try again.');</script>";
    //     header("Location: login.php?error=Incorrect User email or password");
    // }
// }

// Close the database connection
mysqli_close($conn);
?>

