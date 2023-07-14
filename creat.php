
<?php


// Simulating the response data
$responseData = [
    'status' => 'success',
    'message' => 'User created successfully',
    'data' => null
];



// Simulating the response data
$responseData = [
    'status' => 'success',
    'message' => 'User created successfully',
    'data' => null
];

// Extract the required data from the request
$username = $_POST['username'];
$name = $_POST['name'];
$miscode = $_POST['miscode'];
$misrole = $_POST['misrole'];
$role = $_POST['role'];
$email = $_POST['email'];
$allowedModules = $_POST['AllowedModules'];
$password = $_POST['password'];

// Perform user creation logic here (e.g., insert user data into a database)
// Replace this with your own user creation logic
// Example: Creating a user record in a database table

// Connect to your database
$servername = 'Gwdbs1.dailyrazor.com:3306';
$dbUsername = 'your_database_username';
$dbPassword = 'your_database_password';
$dbName = 'your_database_name';

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check the database connection
if ($conn->connect_error) {
    $responseData['status'] = 'error';
    $responseData['message'] = 'Database connection error: ' . $conn->connect_error;
} else {
    // Prepare and execute the SQL statement to insert a new user
    $stmt = $conn->prepare("INSERT INTO users (username, name, miscode, misrole, role, email, AllowedModules, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $username, $name, $miscode, $misrole, $role, $email, $allowedModules, $password);

    if ($stmt->execute()) {
        // User creation successful
        $responseData['status'] = 'success';
        $responseData['message'] = 'User created successfully';
        // You can also set additional data in the response if needed
    } else {
        // User creation failed
        $responseData['status'] = 'error';
        $responseData['message'] = 'Failed to create user: ' . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

// Set the response headers for CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Access-Control-Allow-Methods: POST');

// Set the response headers for JSON
header('Content-Type: application/json');

// Send the response as JSON
echo json_encode($responseData);




?>
