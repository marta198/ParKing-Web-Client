<?php
// API endpoint URL
$api_url = 'http://localhost/ParKing/src/php/webhook.php';

// Request data (if you need to send JSON data in the request body)
$request_data = array(
    'key1' => 'value1',
    'key2' => 'value2'
);

// Convert the request data to JSON format
$request_json = json_encode($request_data);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json', // Set the appropriate content type
    'Authorization: Bearer YOUR_API_TOKEN' // Include any required authentication headers
));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Use 'GET', 'POST', 'PUT', or 'DELETE' as needed

if (!empty($request_data)) {
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request_json); // Include request data in the request body
}

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Output the API response
echo $response;
?>
