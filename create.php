<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
</head>
<body>
  <h2>Sign Up</h2>
  <form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
  
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
  
    <label for="miscode">Miscode:</label>
    <input type="text" id="miscode" name="miscode" required><br><br>
  
    <label for="misrole">Misrole:</label>
    <input type="text" id="misrole" name="misrole" required><br><br>
  
    <label for="role">Role:</label>
    <input type="text" id="role" name="role" required><br><br>
  
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
  
    <label for="AllowedModules">Allowed Modules:</label>
    <input type="text" id="AllowedModules" name="AllowdModules" required><br><br>
  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
  
    <input type="submit" value="Sign Up">
  </form>
  <?php
// Retrieve form data
$username = $_POST['username'];
$name = $_POST['name'];
$miscode = $_POST['miscode'];
$misrole = $_POST['misrole'];
$role = $_POST['role'];
$email = $_POST['email'];
$allowedModules = $_POST['AllowdModules'];
$password = $_POST['password'];

// Connect to your database
$servername = 'localhost';
$dbUsername = 'copilot';
$dbPassword = '*j9tP86z0';
$dbName = 'gwdbs1.dailyrazor.com:3306';

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement to insert a new user
$stmt = $conn->prepare("INSERT INTO signup (username, name, miscode, misrole, role, email, AllowdModules, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $username, $name, $miscode, $misrole, $role, $email, $allowedModules, $password);

if ($stmt->execute()) {
    echo "Sign up successful!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>

</body>
</html>
