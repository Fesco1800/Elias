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

// Get the alias ID and session ID
$aliasId = $_POST['alias_id'];
$sessionId = $_SESSION['id'];

// Retrieve the history records for the given alias ID and session ID
$stmt = $conn->prepare("SELECT * FROM history WHERE alias_id = ? AND user_id = ? GROUP BY edit_timestamp DESC");
$stmt->bind_param("ii", $aliasId, $sessionId);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the history records into an array
$history = array();
while ($row = $result->fetch_assoc()) {
    // Compare the old and new values
    $isDifferent = false;
    $fieldsToCheck = ['url', 'password', 'email', 'phone', 'username', 'firstname', 'middlename', 'lastname', 'birthdate', 'address'];
    
    foreach ($fieldsToCheck as $field) {
        $oldValue = $row['old_'.$field];
        $newValue = $row['new_'.$field];
        
        if ($oldValue !== $newValue) {
            $isDifferent = true;
            break;
        }
    }
    
    // Include the record only if there is at least one difference
    if ($isDifferent) {
        $history[] = $row;
    }
}

// Return the history data as JSON response
echo json_encode($history);

$stmt->close();
$conn->close();



?>
