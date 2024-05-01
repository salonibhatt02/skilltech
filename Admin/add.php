<?php
  include 'db.php';
//   $upload_dir = 'uploads/';
session_start();
    if(!isset($_SESSION['mail'])){
        header("Location: ../login.php");
    }
	
  if (isset($_POST['Submit'])) {
    $name = $_POST['title'];
    $description = $_POST['description'];
	$categories = $_POST['categories'];
    $price = $_POST['price'];
	$videos = $_POST['videos'];
	$duration = $_POST['duration'];
	$lecturer = $_POST['lecturer'];
	$userPic = $_POST['image'];
    // $imgName = $_FILES['image']['name'];
	// 	$imgTmp = $_FILES['image']['tmp_name'];
	// 	$imgSize = $_FILES['image']['size'];

    // if(empty($name)){
	// 		$errorMsg = 'Please input name';
	// 	}elseif(empty($description)){
	// 		$errorMsg = 'Please input description';
	// 	}elseif(empty($price)){
	// 		$errorMsg = 'Please input price';
	// 	}else{

	// 		$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

	// 		$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

	// 		$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

	// 		if(in_array($imgExt, $allowExt)){

	// 			if($imgSize < 5000000){
	// 				move_uploaded_file($imgTmp ,$upload_dir.$userPic);
	// 			}else{
	// 				$errorMsg = 'Image too large';
	// 			}
	// 		}else{
	// 			$errorMsg = 'Please select a valid image';
	// 		}
	// 	}


	// 	if(!isset($errorMsg)){
			// $sql = "insert into products(name, description, categories,price, image, videos, duration, lecturer)
			// 		values('".$name."', '".$description."', '".$categories."' ,'".$price."', '".$userPic."', '".$videos."', '".$duration."', '".$lecturer."')";
			$sql = "INSERT INTO `product`(`title`,`description`,`categories`,`price`,`image`,`videos`,`duration`,`lecturer`) VALUES('$name','$description','$categories','$price','$userPic','$videos','$duration','$lecturer')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: product.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
				echo $errorMsg;
			}
		}
//   }

?>