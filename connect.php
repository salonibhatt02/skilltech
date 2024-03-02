<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "skilltech";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die ("DB Connection error: " . mysqli_connect_error());
}
// else {
//   echo "connection successful";
// }