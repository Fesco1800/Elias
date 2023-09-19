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

// Get values from the request
if (
    isset($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['pwd'], $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['birthdate'], $_POST['address'], $_POST['url']) &&
    !empty($_POST['username']) &&
    !empty($_POST['email']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['pwd']) &&
    !empty($_POST['firstname']) &&
    !empty($_POST['middlename']) &&
    !empty($_POST['lastname']) &&
    !empty($_POST['birthdate']) &&
    !empty($_POST['address']) &&
    !empty($_POST['url'])
) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $url = mysqli_real_escape_string($conn, $_POST['url']);
    $id = $_SESSION['id'];

    // Function to extract domain from URL
    function extractDomain($url) {
        $pattern = "/^(https?:\/\/)?([^\/]+)/i";
        preg_match($pattern, $url, $matches);
        $protocol = isset($matches[1]) ? $matches[1] : '';
        $domain = isset($matches[2]) ? $matches[2] : '';
        return $protocol . $domain;
    }

    // Check for duplicate data
    $urlDomain = extractDomain($url);
    $duplicateQuery = "SELECT * FROM aliases WHERE (username = '$username' OR email = '$email' OR SUBSTRING_INDEX(url, '/', 3) LIKE '%$urlDomain%') AND user_id = '$id'";
    $duplicateResult = mysqli_query($conn, $duplicateQuery);

    if (mysqli_num_rows($duplicateResult) > 0) {
        // Duplicate data found
        $response = array('result' => 'error', 'message' => 'Duplicate data found.');
        echo json_encode($response);
    } else {
        // No duplicate data found, proceed with insertion
        $query = "INSERT INTO aliases (user_id, url, password, email, phone, username, firstname, middlename, lastname, birthdate, address, created_at)
            VALUES ('$id', '$url', '$pwd', '$email', '$phone', '$username', '$firstname', '$middlename', '$lastname', '$birthdate', '$address', NOW())";
        if (mysqli_query($conn, $query) == TRUE) {
            $response = array('result' => 'success');
            echo json_encode($response);
        } else {
            $response = array('result' => 'error', 'message' => $conn->error);
            echo json_encode($response);
        }
    }
} else {
    // Handle missing or empty values
    $response = array('result' => 'error', 'message' => 'Missing or empty values');
    echo json_encode($response);
}

$conn->close();
?>
