<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $offer_title = $_POST['offer_title'];
    $offer_description = $_POST['offer_description'];
    $offer_code = $_POST['offer_code'];
    // $offer_start_time = $_POST['offer_start_time'];
    // $offer_end_time = $_POST['offer_end_time'];
    $offer_start_time = date('Y-m-d\TH:i:s\Z', strtotime($_POST['offer_start_time']));
    $offer_end_time = date('Y-m-d\TH:i:s\Z', strtotime($_POST['offer_end_time']));
    $offer_tnc_type = $_POST['offer_tnc_type'];
    $offer_tnc_value = $_POST['offer_tnc_value'];
    $offer_type = $_POST['offer_type'];
    $discount_type = $_POST['discount_type'];
    $discount_value = $_POST['discount_value'];
    $max_discount_amount = $_POST['max_discount_amount'];
    $cashback_type = $_POST['cashback_type'];
    $cashback_value = $_POST['cashback_value'];
    $max_cashback_amount = $_POST['max_cashback_amount'];
    $bank_name = $_POST['bank_name'];
    $min_amount = $_POST['min_amount'];
    $max_allowed = $_POST['max_allowed'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sandbox.cashfree.com/pg/offers',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "offer_meta": {
    "offer_title": "' . $offer_title . '",
    "offer_description": "' . $offer_description . '",
    "offer_code": "' . $offer_code . '",
    "offer_start_time": "' . $offer_start_time . '",
    "offer_end_time": "' . $offer_end_time . '"
  },
  "offer_tnc": {
    "offer_tnc_type": "' . $offer_tnc_type . '",
    "offer_tnc_value": "' . $offer_tnc_value . '"
  },
  "offer_details": {
    "offer_type": "' . $offer_type . '",
    "discount_details": {
      "discount_type": "' . $discount_type . '",
      "discount_value": ' . $discount_value . ',
      "max_discount_amount": ' . $max_discount_amount . '
    },
    "cashback_details": {
      "cashback_type": "' . $cashback_type . '",
      "cashback_value": ' . $cashback_value . ',
      "max_cashback_amount": ' . $max_cashback_amount . '
    }
  },
  "offer_validations": {
    "payment_method": {
      "netbanking": {
        "bank_name": "' . $bank_name . '"
      }
    },
    "min_amount": "' . $min_amount . '",
    "max_allowed": "' . $max_allowed . '"
  }
}',
  CURLOPT_HTTPHEADER => array(
    'accept: application/json',
    'content-type: application/json',
    'x-api-version: 2023-08-01',
    'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
    'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

}