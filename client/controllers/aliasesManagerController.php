<?php
// require_once '../assets/setup/db.inc.php';

// if (!isset($_SESSION['id'])) {
//   header("Location: ../login");
//     exit(); 
// }else{
//   $session_id = $_SESSION['id']; 

//   $query  = "SELECT * FROM aliases WHERE user_id = $session_id"; 
//   $result = mysqli_query($conn,$query);
//   $data = array();
//   while ($row = mysqli_fetch_assoc($result)) {
//     $data[] = $row;
//   }
//   $aliases = $data;

// }


require_once '../assets/setup/db.inc.php';

if (!isset($_SESSION['id'])) {
  header("Location: ../login");
  exit(); 
} else {
  $session_id = $_SESSION['id']; 

  $query  = "SELECT * FROM aliases WHERE user_id = $session_id"; 
  $result = mysqli_query($conn, $query);
  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $row['domain'] = getDomainName($row['url']);
    $data[] = $row;
  }
  $aliases = $data;
}

function getDomainName($url) {
  $parsedUrl = parse_url($url);
  $domain = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
  return $domain;
}

?>
