<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
  
    <input type="submit" value="Login">
  </form>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
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

    // Prepare and execute the SQL statement to select the user with the given credentials
    $stmt =("SELECT * FROM signup WHERE username = '$username' AND password ='$password' ");
    $result =$conn->query($stmt);
  

    if ($result->num_rows === 1) {
        // Valid credentials
        echo "Login successful!";
        // Additional logic or redirection can be added here
        // For example, you can redirect the user to a dashboard or perform further actions
    } else {
        // Invalid credentials
        header("Location: create.php"); // Redirect back to login.php
        exit();
    }

    // Close the statement and database connection
    
    $conn->close();
}
?>


</body>
</html>

