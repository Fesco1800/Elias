<?php

session_start();

// Set database credentials
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "eliasdb";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if (isset($_POST['delete_alias'])) {
    $aliasId = $_POST['alias_id'];

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM aliases WHERE id = ?");
    $stmt->bind_param("i", $aliasId);

    if ($stmt->execute()) {
        // Deletion successful
        $message = "You have successfully deleted an alias";
    } else {
        // Deletion failed
        $message =  "Error deleting alias: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle the case where delete_alias is not set
    $message = "Invalid request";
}

// Store the message in a session variable
$_SESSION['message'] = $message;

// Redirect to the desired page
header("Location: ../../client/");
exit();

?>
