 <?php

session_start();
    
if(!isset($_SESSION['email'])){
    header('location: login.php');
}

include 'connect.php';

$cus_email = $_SESSION['email'];
$cus_name = $_SESSION['name'];
$cus_phone = $_SESSION['phone'];




$link_amount = $_GET['amount'];
$link_purpose = $_GET['title'];
// Get the price and title from the modal

// File to store the link ID counter
$counterFile = 'link_id.txt';

// Read the current counter value from the file
$currentCounter = file_get_contents($counterFile);

// Increment the counter
$newCounter = $currentCounter + 1;

// Generate a link ID using the incremented counter
$newLinkId = "my_product_" . $newCounter;

// Write the updated counter back to the file
file_put_contents($counterFile, $newCounter);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.cashfree.com/pg/links',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "customer_details": {
    "customer_phone": "' . $cus_phone . '",
    "customer_email": "' . $cus_email . '",
    "customer_name": "' . $cus_name . '"
  },
  "link_notify": {
    "send_sms": true,
    "send_email": true
  },
  "link_id": "' . $newLinkId . '",
  "link_amount": "' . $link_amount . '",
  "link_currency": "INR",
  "link_purpose": "' . $link_purpose . '"
}
',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'content-type: application/json',
    'x-api-version: 2023-08-01',
    'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
    'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6'
  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($err){
    echo "cURL Error #:" . $err;
}
else{
    // echo $response;
   
    $result = json_decode($response);

    $customer_name = $result->customer_details->customer_name;
    $customer_phone = $result->customer_details->customer_phone;
    $customer_email = $result->customer_details->customer_email;
    $link_id = $result->link_id;
    $payment_amount = $result->link_amount;
    $payment_purpose = $result->link_purpose;

    $sql = "INSERT INTO `link_details`(`customer_name`,`customer_phone`,`customer_email`,`link_id`,`payment_amount`,`payment_purpose`) VALUES ('$customer_name','$customer_phone','$customer_email','$link_id','$payment_amount','$payment_purpose')";

    $result1 = mysqli_query($conn, $sql);
   
    header('Location: '.$result->link_url);
   
    // $customer_name = $result->customer_name;

    // var_dump($customer_name);
    // $customer_phone = $result->customer_phone;
    // $customer_email = $result->customer_email;
    // $link_id = $result->link_id;
    // $payment_amount = $result->link_amount;
    // $payment_purpose = $result->link_purpose;

    // $sql = "INSERT INTO `link_details`(`customer_name`,`customer_phone`,`customer_email`,`link_id`,`payment_amount`,`payment_purpose`) VALUES ('$customer_name','$customer_phone','$customer_email','$link_id','$payment_amount','$payment_purpose')";

    // $result1 = mysqli_query($conn, $sql);
    }
    ?>

<!-- <script>
  window.onload = function() {
    // Select the elements you want to style on the linked page
    var elementsToStyle = document.getElementByClassName('payment-info');

    // Apply CSS styles to each selected element
    elementsToStyle.forEach(function(element) {
      element.style.display = 'none'; // Replace property and value with your desired CSS
    });
  };
</script> -->