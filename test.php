<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.cashfree.com/pg/orders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "customer_details": {
    "customer_id": "qasTRS5W3W",
    "customer_email": "john@cashfree.com",
    "customer_phone": "7400207302"
  },
  "order_amount": 100,
  "order_currency": "INR"
}',
  CURLOPT_HTTPHEADER => array(
    'x-api-version: 2023-08-01',
    'content-type: application/json',
    'accept: application/json',
    'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
    'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
