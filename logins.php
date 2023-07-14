<?php

// Simulating the response data
$responseData = [
    'status' => 'success',
    'message' => 'Login successful',
    'data' => [
        'User' => [
            'AllowedModules' => 'ALL',
            'email' => 'ralekeo@gmail.com',
            'miscode' => '0',
            'misrole' => 'Bank',
            'name' => 'Spearhead Admin',
            'role' => 'admin',
            'userid' => 1,
            'username' => 'admin'
        ],
        'home' => '/analytics/reports/9DF71E64-183F-44D0-9E54-8C610FA095CC',
        'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1bmlxdWVfbmFtZSI6ImFkbWluIiwibmJmIjoxNjg5MzMzMDY2LCJleHAiOjE2ODkzMzQyNjYsImlhdCI6MTY4OTMzMzA2Nn0.dXVyh2GDmbA-aQuvJDXnn7DuoNl7AZN1tpWcpHe6y0Y'
    ]
];

// Extract the required data from the response
$userData = $responseData['data']['User'];
$token = $responseData['data']['token'];

// Perform login validation using the provided data
$username = $_POST['username']; // Retrieve the username from the request
$password = $_POST['password']; // Retrieve the password from the request

// Perform your login validation logic here (e.g., check credentials against a database)
// Replace this with your own validation logic
if ($username === $userData['username'] && $password === 'password') {
    // Login successful
    $responseData['status'] = 'success';
    $responseData['message'] = 'Login successful';
    // Set additional data if needed
} else {
    // Login failed
    $responseData['status'] = 'error';
    $responseData['message'] = 'Invalid username or password';
    // Set additional data if needed
}

// Set the response headers for CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

// Set the response headers for JSON
header('Content-Type: application/json');

// Send the response as JSON
echo json_encode($responseData);

?>
