<?php

session_start();
    
if(!isset($_SESSION['mail'])){
    header("Location: ../login.php");
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $offer_title = $_POST['offer_title'];
    $offer_description = $_POST['offer_description'];
    $offer_code = $_POST['offer_code'];
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
    $min_amount = $_POST['min_amount'];
    $max_allowed = $_POST['max_allowed'];

    // Retrieve dynamically added payment method key-value pairs
    $payment_methods = array();
    if (isset($_POST['payment_method_key']) && isset($_POST['payment_method_value'])) {
        $payment_method_keys = $_POST['payment_method_key'];
        $payment_method_values = $_POST['payment_method_value'];
        for ($i = 0; $i < count($payment_method_keys); $i++) {
            $payment_methods[$payment_method_keys[$i]] = $payment_method_values[$i];
        }
    }

    // Prepare API request data
    $request_data = array(
        "offer_meta" => array(
            "offer_title" => $offer_title,
            "offer_description" => $offer_description,
            "offer_code" => $offer_code,
            "offer_start_time" => $offer_start_time,
            "offer_end_time" => $offer_end_time
        ),
        "offer_tnc" => array(
            "offer_tnc_type" => $offer_tnc_type,
            "offer_tnc_value" => $offer_tnc_value
        ),
        "offer_details" => array(
            "offer_type" => $offer_type,
            "discount_details" => array(
                "discount_type" => $discount_type,
                "discount_value" => $discount_value,
                "max_discount_amount" => $max_discount_amount
            ),
            "cashback_details" => array(
                "cashback_type" => $cashback_type,
                "cashback_value" => $cashback_value,
                "max_cashback_amount" => $max_cashback_amount
            )
        ),
        "offer_validations" => array(
            "payment_method" => array(
                "all" => $payment_methods // Add dynamically added payment method key-value pairs here
            ),
            "min_amount" => $min_amount,
            "max_allowed" => $max_allowed
        )
    );

    // Send API request
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
        CURLOPT_POSTFIELDS => json_encode($request_data),
        CURLOPT_HTTPHEADER => array(
            'accept: application/json',
            'content-type: application/json',
            'x-api-version: 2023-08-01',
            'x-client-id: '.$decrypted_clientid,
            'x-client-secret: '.$decrypted_clientsecret
        ),
    ));
    $response = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    // echo $response;
    if ($http_status == 200) {
        // Offer created successfully
        echo '<script>alert("Offer created successfully.");</script>';
    } else {
        // Offer creation failed
        echo '<script>alert("Error creating offer. Please try again.");</script>';
    }

    // Redirect to offer.php after processing API response
    echo '<script>window.location.href = "offer.php";</script>';
    exit(); // Ensure script stops after redirection


}
?>
