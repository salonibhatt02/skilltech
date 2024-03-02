<?php

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
    "customer_phone": "9998105971",
    "customer_email": "gauravsp2003@gmail.com",
    "customer_name": "Gaurav"
  },
  "link_notify": {
    "send_sms": true,
    "send_email": true
  },
  "link_id": "my_product_52",
  "link_amount": 100,
  "link_currency": "INR",
  "link_purpose": "Payment for book"
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
    header('Location: '.$result->link_url);

}
