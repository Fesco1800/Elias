<?php
// require_once '../assets/setup/db.inc.php';
// $session_id = $_SESSION['id']; 
// $query = "SELECT * FROM logins WHERE user_id = $session_id ORDER BY created_at DESC"; 
// $result = mysqli_query($conn, $query);
// $data = array();
// while ($row = mysqli_fetch_assoc($result)) {
//   $data[] = $row;
// }
// $logins = $data;




require_once '../assets/setup/db.inc.php';


if (!isset($_SESSION['id'])) {
  header("Location: ../login");
  exit(); 
}

$session_id = $_SESSION['id'];
$query = "SELECT * FROM logins WHERE user_id = $session_id ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $row['domain'] = getDomainName($row['url']);
    $data[] = $row;
}
$logins = $data;

function getDomainName($url) {
    $parsedUrl = parse_url($url);
    $domain = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
    return $domain;
}






?>
