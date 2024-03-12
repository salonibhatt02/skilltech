<?php

$curl = curl_init();

include 'connect.php';

$sql = "SELECT link_id from link_details";
$result1 = mysqli_query($conn, $sql);

// Fetching the link_id from the result object
$row = mysqli_fetch_assoc($result1);
$link_id = $row['link_id'];

// $a = "my_product_77";
$url = 'https://sandbox.cashfree.com/pg/links/' . $link_id;

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'x-api-version: 2023-08-01',
    'Accept: application/json',
    'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
    'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

$result = json_decode($response);

// $customer_name = $result->customer_details->customer_name;
// echo $customer_name;
// $customer_phone = $result->customer_details->customer_phone;
// echo $customer_phone;
// $customer_email = $result->customer_details->customer_email;
// echo $customer_email;
// $link_amount = $result->link_amount;
// echo $link_amount;
// $link_purpose = $result->link_purpose;
// echo $link_purpose;
// $link_status = $result->link_status;
// echo $link_status;

// $sql2 = "";

?>