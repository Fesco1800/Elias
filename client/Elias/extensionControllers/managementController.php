<?php
session_start();

// Set database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "eliasdb";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve aliases data for the logged in user
$session_id = $_SESSION['id']; 
$query  = "SELECT * FROM aliases WHERE user_id = $session_id"; 
$result = mysqli_query($conn,$query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// Send the data back as a JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>
