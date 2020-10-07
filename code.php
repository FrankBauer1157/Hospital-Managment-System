<?php
require('includes/config.php');
session_start();
$_SESSION['color'] = "alert alert-success";
$_SESSION['invoke'] = "0";
$ud = $_SESSION['orgid'];
$_SESSION['sq'] = "SELECT * from phonebook where `status` = '0'  and uid = '$ud'";


//Insert Patient
if (isset($_POST['savepatient'])) {
    $pid = generateRandomString($lengt = 6);
    $Fname = $_POST['faname'];
    $Lname  = $_POST['laname'];
    $Tel  = $_POST['tael'];
    $Age  = $_POST['age'];
    $Mot  = $_POST['mot'];
    $Visit  = $_POST['vp'];
    $Ab  = $_POST['ab'];
    $cc = $_POST['cc'];
    $Status  = 0;
    $Date  = date("y-m-d");
    $query = "INSERT INTO reception(`Pid`,`Fname`,`Lname`,`Tel`,`Age`,`Mot`,`Visit`,`AB`,`CC`,`Status`,`remarks`,`Date`) 
    values ('$pid','$Fname','$Lname','$Tel','$Age','$Mot','$Visit','$Ab','$cc','$Status','none','$Date')";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "New Patient Saved";
        header('Location: index.php');
    } else {
        $_SESSION['success'] =  "Sender Id not Saved,try again Later";
        header('Location: manage_sender_id.php');
    }
}
// user register by admin
if (isset($_POST['registeruseradmin'])) {
    $orgname = $_POST['orgname'];
    $fname = $_POST['fname'];
    $mail = $_POST['mail'];
    $lname = $_POST['lname'];
    $tel = $_POST['tel'];
    $pword = $_POST['pasw'];
    // $pword2 = $_POST['pword2'];
    $length = 16;
    $orgid =  generateRandomString($length);
    $_SESSION['xid'] = $orgid;

    $query = "INSERT INTO users (Orgname,Fname,Lname,password,email,Orgid,status,Tel,senderid,credit,category,rate) VALUES  ((SELECT `Orgname` from senderid where Orgid = '$orgname'),'$fname','$lname','$pword','$mail','$orgid','1','$tel','$orgname','10','user','1.0')";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        //"send credentisl  sms to user";
        $_SESSION['success'] =  "New user created successfuly ";
        header('Location: manage_users.php');
    } else {
        // echo "not done";
        // $_SESSION['set'] = "0";
        $_SESSION['success'] =  "Error, You dont have admin Privilages to perform this action";
        header('Location: manage_users.php');
    }
}

//send to lab
if (isset($_POST['sendtolab'])) {
    $id = Trim($_POST['Pid']);
    $descr = $_POST['descr'];
    $query = "INSERT INTO lab (pid,test,`status`,datecreated) Values ('$id','$descr','1',CURDATE())";
    if ($query_run = mysqli_query($connection, $query)) {
        //  $xid = $_POST['Pid'];
        $query = "UPDATE reception SET Visit = '1'  WHERE Pid ='$id' ";
        if ($query_run = mysqli_query($connection, $query)) {
            $_SESSION['tolab'] = "Patient has  Been sent to Lab after update";
            header('Location: sgames.php');
        } else {
            $_SESSION['tolab'] = "Patient status not updated";
            header('Location: sgames.php');
        }
    } else {
        $_SESSION['tolab'] = "Patient has not Been sent to Lab";
        header('Location: sgames.php');
    }
}
//from co to discharge and add remarks
if (isset($_POST['fromco'])) {
    $id = Trim($_POST['Pid']);
    $descrxx = $_POST['remarks'];
    $query = "UPDATE reception SET remarks = '$descrxx' , Status ='4'  WHERE Pid ='$id' ";
    if ($query_run = mysqli_query($connection, $query)) {
        $query = "UPDATE lab SET  status ='2'  WHERE Pid ='$id' ";
        if ($query_run = mysqli_query($connection, $query)) {

            $_SESSION['tolab'] = "Patient has  Been sent For Dispatch";
            header('Location: sgames.php');
        }
    } else {
        $_SESSION['tolab'] = "Patient status not updated";
        header('Location: sgames.php');
    }
}

//dishcrge
if (isset($_POST['discharge'])) {
    $id = Trim($_POST['Pid']);
    // $descrxx = $_POST['remarks'];
    $query = "UPDATE reception SET  Status ='1'  WHERE Pid ='$id' ";
    if ($query_run = mysqli_query($connection, $query)) {
        $_SESSION['success'] = "Patient has  Been Discharged";
        header('Location: send_sms.php');
    } else {
        $_SESSION['tolab'] = "Patient not been discharged";
        header('Location: send_sms.php');
    }
}
//dischrge 1
if (isset($_POST['discharge1'])) {
    $id = Trim($_POST['Pid']);
     $descrxx1 = $_POST['descr'];
    $query = "UPDATE reception SET   Status ='4'  WHERE Pid ='$id' ";
    if ($query_run = mysqli_query($connection, $query)) {
        $_SESSION['tolab'] = "Patient has  Been sent For Dispatch";
            header('Location: sgames.php');
    } else {
        $_SESSION['tolab'] = "Patient has not  Been sent For Dispatch";
            header('Location: sgames.php');
    }
}

//from lab update lab results
if (isset($_POST['sendtoco'])) {
    $id = Trim($_POST['Pid']);
    $descr = $_POST['results'];
    $query = "UPDATE lab SET results = '$descr' , status ='0'  WHERE Pid ='$id' ";
    if ($query_run = mysqli_query($connection, $query)) {
        $_SESSION['fromlab'] = "Patient has  Been sent to see the Doctor";
        header('Location: lab.php');
    } else {
        $_SESSION['fromlab'] = "Patient status not updated";
        header('Location: lab.php');
    }
}




//login code
if (isset($_POST['login_btn'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * from user where email = '$username' and pass = '$password'";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run) > 0) {
        $row =  $query_run->fetch_assoc();
        $ux = $row['status'];
        $fn = $row['Fname'];
        //echo $userme;
        if ($ux == '2') {
            $_SESSION['status'] = "$fn,your Account is suspended,Contact Us +254729339042";
            header('location: login.php');
        } elseif ($ux == '3') {
            $_SESSION['status'] = "$fn,your Account has not been Verified,please verify your number or call support 0729339042";
            header('location: login.php');
        } else {
            $_SESSION['orgid'] = $row['Orgid'];
            $ud = $_SESSION['orgid'];
            $_SESSION['username'] =  $row['Fname'];
            header('location: index.php');
        }
    } else {
        $_SESSION['status'] = 'Email or Password Not Correct';
        header('location: login.php');
    }
}


function generateRandomString($length)
{
    $characters = '0opqrstuvwxyzA12345LMNOPQRSTUVW6789abcdefghijklmnBCDEFGHIJKXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
