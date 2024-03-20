<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

include 'connect.php';


$curl = curl_init();
$link_id = $_SESSION['link_id'];
$url = "https://sandbox.cashfree.com/pg/links/$link_id/cancel";

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
    'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6',
    'accept: application/json',
    'x-api-version: 2023-08-01'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
header('location: categories.php');

?>