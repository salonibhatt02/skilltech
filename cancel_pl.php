<?php

// session_start();
    
// if(!isset($_SESSION['email'])){
//     header('location: login.php');
// }

// include 'connect.php';

// $link_id = $_GET['link_id'];

// $sql = "SELECT link_id FROM product WHERE `title` = '$link_purpose'";
// $result = mysqli_query($conn, $sql);

// if ($row = mysqli_fetch_assoc($result)) {
//     $link_id = $row['link_id'];

    // Call the cancel API with the retrieved link ID
    // $curl = curl_init();

    // curl_setopt_array($curl, array(
    //     CURLOPT_URL => "https://sandbox.cashfree.com/pg/links/$link_id/cancel",

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://sandbox.cashfree.com/pg/links/my_link_id_10/cancel',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_HTTPHEADER => array(
//     'x-api-version: 2023-08-01',
//     'Accept: application/json',
//     'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
//     'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;
// } else {
//   echo "Error: Link ID not found";
// }
// $link_id = $_GET['link_id'];
// echo "Link ID: " . $link_id; // Debug statement

// if ($link_id) {
    // Call the cancel API with the retrieved link ID
//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://sandbox.cashfree.com/pg/links/$link_id/cancel",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 0,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_HTTPHEADER => array(
//             'x-api-version: 2023-08-01',
//             'Accept: application/json',
//             'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
//             'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6'
//         ),
//     ));

//     $response = curl_exec($curl);
//     echo "Cancel API Response: " . $response; // Debug statement
//     curl_close($curl);

//     echo $response;
// } else {
//     echo "Error: Link ID not found";
// }


session_start();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

include 'connect.php';

// Debug: Print all GET parameters
var_dump($_GET);

$link_id = $_GET['link_id'] ?? null; // Use null coalescing operator to handle unset index

if ($link_id) {
    // Call the cancel API with the retrieved link ID
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://sandbox.cashfree.com/pg/links/$link_id/cancel",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'x-api-version: 2023-08-01',
            'Accept: application/json',
            'x-client-id: TEST1012923093d7ea697399f48c341b03292101',
            'x-client-secret: cfsk_ma_test_69a627f2ff84c5efdb9b277d749697a9_360454a6'
        ),
    ));

    $response = curl_exec($curl);
    echo "Cancel API Response: " . $response; // Debug statement
    curl_close($curl);

    echo $response;
} else {
    echo "Error: Link ID not found";
}
?>

