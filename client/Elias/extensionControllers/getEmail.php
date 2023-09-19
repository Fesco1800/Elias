<?php
header('Access-Control-Allow-Origin: *');
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

// Retrieve the email for the logged in user
if (isset($_SESSION['id'])) {
    $session_id = $_SESSION['id'];

    $query  = "SELECT email FROM users WHERE id = $session_id LIMIT 1";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error in query: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];

    // Send the email back as a JSON response
    header('Content-Type: application/json');
    echo json_encode($email);
} else {
    // Send an empty response or an appropriate error message
    echo "";
}

$conn->close();
exit;
?>
