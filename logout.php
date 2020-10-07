<?php
session_start();
//include('includes/security.php');
if (isset($_POST['logout_btn'])){
  //session_destroy();
  
 unset(  $_SESSION['username']);
 $_SESSION['status'] = "Please Log in again to continue";
              header('Location: login.php');

}


