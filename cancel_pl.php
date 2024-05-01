<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

include 'connect.php';

$query = "SELECT * FROM `authorizations`";
$query_result = mysqli_query($conn, $query);

if ($query_result && mysqli_num_rows($query_result) > 0) {
  $query_row = mysqli_fetch_assoc($query_result);

  $decryption_key = '123456789012345678901234567890012';
  $cipher = "AES-256-CBC";
  $options = 0;
  $iv = str_repeat("0",openssl_cipher_iv_length($cipher));

  $encrypted_clientid = $query_row['clientid'];
  $encrypted_clientsecret = $query_row['clientsecret'];

  // Decrypt clientid
  $decrypted_clientid = openssl_decrypt($encrypted_clientid, $cipher, $decryption_key, $options, $iv);

  // Decrypt clientsecret
  $decrypted_clientsecret = openssl_decrypt($encrypted_clientsecret, $cipher, $decryption_key, $options, $iv);

}

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
    'x-client-id: '.$decrypted_clientid,
    'x-client-secret: '.$decrypted_clientsecret,
    'accept: application/json',
    'x-api-version: 2023-08-01'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
header('location: categories.php');

?>