<?php
header('Access-Control-Allow-Origin: *');

// var_dump($_POST);
// die();

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



// Get values
$date = mysqli_real_escape_string($conn, $_POST['date']);
$url = mysqli_real_escape_string($conn, $_POST['url']);
$status = "";

// Check if the URL contains logout keywords or patterns
if (stripos($url, 'logout') !== false || stripos($url, 'signout') !== false) {
    $status = "logout";
} elseif (stripos($url, 'register') !== false || stripos($url, 'signup') !== false){
    $status = "register";
}elseif (stripos($url, 'login') !== false || stripos($url, 'signin') !== false) {
    $status = "login";

// // Extract username, email, and password from the POST data
//     $username0 = mysqli_real_escape_string($conn, $_POST['username']);
//     $email0 = mysqli_real_escape_string($conn, $_POST['email']);
//     $password0 = mysqli_real_escape_string($conn, $_POST['password']);

// // Query to check if the username or email and password match in the database
//     $query0 = "SELECT * FROM aliases WHERE (username = '$username0' OR email = '$email0') AND password = '$password0'";
//     $result0 = mysqli_query($conn, $query0);

//     if (mysqli_num_rows($result0) < 1) {
// // Match found, save "login failed" status
//         $status = "login failed";
//     }

}elseif (stripos($url, 'create account') !== false ){
    $status = "register";
}elseif (stripos($url, 'my') !== false && stripos($url, 'account') !== false ){
    $status = "login";
}elseif (stripos($url, 'join') !== false){
    $status = "register";
}


if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    $result[] = array("result" => "login first");
    echo json_encode($result);
    exit;
}

// Extract username and email from the POST data
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$q = "SELECT * FROM aliases WHERE user_id = '$id'";
$res = mysqli_query($conn, $q);

$matchedAlias = null;
if (
    stripos($url, 'signin') !== false ||
    stripos($url, 'login') !== false ||
    stripos($url, 'signup') !== false ||
    stripos($url, 'register') !== false ||
    stripos($url, 'logout') !== false ||
    stripos($url, 'signout') !== false ||
    stripos($url, 'my') !== false ||
    stripos($url, 'account') !== false ||
    stripos($url, 'join') !== false
) {
    while ($row = mysqli_fetch_assoc($res)) {
        $dbUrl = $row['url'];

// Extract the host from the URL using parse_url()
        $dbHost = parse_url($dbUrl, PHP_URL_HOST);
        $inputHost = parse_url($url, PHP_URL_HOST);

// Compare the hosts
        if ($dbHost === $inputHost) {
// Match found, assign the matched alias to a variable
            $matchedAlias = $row;
break; // Exit the loop since we found a match
}
}
}


if ($matchedAlias) {

// Match found, perform actions with the matched alias
    $query = "INSERT INTO logins (user_id, url, status, created_at, username, email, password) 
    VALUES ('$id', '$url', '$status', '$date', '$username', '$email', '$password')";
    if (mysqli_query($conn, $query) === TRUE) {
        $result[] = array("result" => "success");
    } else {
        echo $conn->error;
        $result[] = array("result" => "error");
    }
} else {
    $result[] = array("result" => "no match");
    echo json_encode($result);
}

$conn->close();
?>
