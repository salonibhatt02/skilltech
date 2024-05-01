<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $imgName = $_FILES['image']['name'];
	// 	$imgTmp = $_FILES['image']['tmp_name'];
	// 	$imgSize = $_FILES['image']['size'];

    if(empty($name)){
			$errorMsg = 'Please input name';
		}elseif(empty($phone)){
			$errorMsg = 'Please input phone no';
		}elseif(empty($email)){
			$errorMsg = 'Please input email';
        }elseif(empty($password)){
			$errorMsg = 'Please input password';
		// }else{

		// 	$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

		// 	$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

		// 	$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

		// 	if(in_array($imgExt, $allowExt)){

		// 		if($imgSize < 5000000){
		// 			move_uploaded_file($imgTmp ,$upload_dir.$userPic);
		// 		}else{
		// 			$errorMsg = 'Image too large';
		// 		}
		// 	}else{
		// 		$errorMsg = 'Please select a valid image';
		// 	}
		}


		if(!isset($errorMsg)){
			$sql = "insert into addadmin(name, phone, email,password)
					values('".$name."', '".$phone."', '".$email."','".$password."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>