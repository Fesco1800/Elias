<?php
session_start();
ob_start();
require "../assets/setup/env.php";
require '../assets/setup/db.inc.php';
require '../assets/includes/auth_functions.php';
require '../assets/includes/security_functions.php';

if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo APP_DESCRIPTION;  ?>">
    <meta name="author" content="<?php echo APP_OWNER;  ?>">

    <title><?php echo APP_NAME . ' | ' . TITLE; ?></title>
    <link rel="icon" type="image/png" href="../assets/images/eliaslogo.png">

    <link rel="stylesheet" href="../assets/vendor/bootstrap-4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome-5.12.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../client/css/management.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" integrity="sha512-fRVSQp1g2M/EqDBL+UFSams+aw2qk12Pl/REApotuUVK1qEXERk3nrCFChouag/PdDsPk387HJuetJ1HBx8qAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles -->
    <link rel="stylesheet" href="../assets/css/app.css">
    <!-- <link rel="stylesheet" href="../assets/css/sidebar.css"> -->
    <link rel="stylesheet" href="custom.css">
    <!-- <link rel="stylesheet" href="css/management.css"> -->
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/59784df54a.js" crossorigin="anonymous"></script>
    
</head>

<body>
  <div class="background-image">
    <img src="../assets/images/eliaslogo.png" alt="Background Image">
  </div>
  <div class="overlay"></div>
  <div class="forAll">
  
    


    <?php require 'navbar.php'; ?>
    
    
    