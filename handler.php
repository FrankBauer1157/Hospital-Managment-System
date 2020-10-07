<?php
session_start();
$handlex = $_GET['handlename'];
//$_SESSION['sq'] =  "SELECT * from reception where Visit = '0' and Status = '0'";
  $uidx = $_GET['uid'];
if($handlex == '1'){
    $_SESSION['title'] = "Consultation Que";
    //$d =  "SELECT * from reception where Visit = '$num' and Status = '0'";
    $_SESSION['sq'] =  "SELECT * from reception where Visit = '0' and Status = '0'";
    $_SESSION['num'] = '1';
    $_SESSION['numx'] = '1';
    header('Location: sgames.php');
    
}

else if($handlex == '2')
{
    $_SESSION['title'] = "Lab Que";
    $d =  "SELECT * from lab where status = '0'";
    $_SESSION['sq'] =   "SELECT * from lab where status = '0'";
    $_SESSION['numx'] = '0';
    header('Location: sgames.php');   
}
if($uidx!==''){
    $_SESSION['uidx'] = $uidx;
}