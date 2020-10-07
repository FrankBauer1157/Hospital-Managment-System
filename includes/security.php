<?php
include('includes/config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    $_SESSION['status'] = "Please Login first";
    die(header('Location:login.php'));
  } else {
   
}
