<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.cashfree.com/pg/links/saloni_1',
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
