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

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $title = $_POST["title"];
  $price = $_POST["price"];
  $description = $_POST["description"];
  $image = $_POST["image"];
  $categories = $_POST["categories"];
  $videos = $_POST["videos"];
  $duration = $_POST["duration"];
  $lecturer = $_POST["lecturer"];

  $sql = "INSERT INTO `product`(`title`,`price`,`description`,`image`,`categories`,`videos`,`duration`,`lecturer`) VALUES ('$title','$price','$description','$image','$categories','$videos','$duration','$lecturer')";

  $result = mysqli_query($conn, $sql);

  if(!$result)
  {
    echo "Error in data insertion : " . mysqli_error($conn);
  }
  else{
    echo "data inserted successful";
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <form action="/skilltech/insert.php" method="post">
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" class="form-control" id="Title" name="title" placeholder="Course Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="form-control" id="Description" name="description" placeholder="About your product">
        </div>
        <div class="form-group">
                            <label for="exampleFormControlInput1">categories:</label>
        
                                <select id="categories" name="categories">
                                    <option value="Web Development">Web Development</option>
                                    <option value="Designing">Designing</option>
                                    <option value="Android Development">Android Development</option>
                                    <option value="Analysis">Analysis</option>
                                </select>
                            </div> 
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="number" class="form-control" id="Price" name="price" placeholder="100 INR">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">No of Videos</label>
            <input type="number" class="form-control" id="Videos" name="videos" placeholder="5">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Duration(in hours)</label>
            <input type="number" class="form-control" id="Duration" name="duration" placeholder="3">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Lecturer</label>
            <input type="text" class="form-control" id="Lecturer" name="lecturer" placeholder="John Doe">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Image</label>
          <input type="file" class="form-control" id="Image" name="image" placeholder="image of the product" accept="image/png , image/jpeg">
        </div>
        <button type="submit" class="btn btn-primary" name="save">Save Record</button>
      </form>
</body>
</html>