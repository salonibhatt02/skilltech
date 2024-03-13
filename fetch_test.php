<?php

$curl = curl_init();

include 'connect.php';

// Select all link_ids from link_details
$sql = "SELECT link_id FROM link_details";
$result1 = mysqli_query($conn, $sql);

// Set up cURL options outside the loop
curl_setopt_array($curl, array(
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

// Iterate over each row in the result
while ($row = mysqli_fetch_assoc($result1)) {
    $link_id = $row['link_id'];

    // Construct the URL with the current link_id
    $url = 'https://sandbox.cashfree.com/pg/links/' . $link_id;

    // Set the URL in the cURL options
    curl_setopt($curl, CURLOPT_URL, $url);

    // Execute cURL request
    $response = curl_exec($curl);

    // Decode JSON response
    $result = json_decode($response);

    // Extract and store data in the database
    $customer_name = $result->customer_details->customer_name;
    echo $customer_name;
    $customer_phone = $result->customer_details->customer_phone;
    echo $customer_phone;
    $customer_email = $result->customer_details->customer_email;
    echo $customer_email;
    $link_amount = $result->link_amount;
    echo $link_amount;
    $link_purpose = $result->link_purpose;
    echo $link_purpose;
    $link_status = $result->link_status;
    echo $link_status;

    // Construct and execute SQL query to insert data into the database
    // $sql2 = "INSERT INTO your_table_name (link_id, customer_name, customer_phone, customer_email, link_amount, link_purpose, link_status) 
    //          VALUES ('$link_id', '$customer_name', '$customer_phone', '$customer_email', '$link_amount', '$link_purpose', '$link_status')";
    
    // mysqli_query($conn, $sql2);

    // Clear the SQL query for the next iteration
    // $sql2 = "";
}

// Close cURL outside the loop
curl_close($curl);

?>