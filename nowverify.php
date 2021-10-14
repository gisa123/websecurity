<?php
session_start();

require_once('database.php');
// REGISTER USER
if (isset($_POST['verifynow'])) {
  // receive all input values from the form
 
  $email = $conn->real_escape_string($_POST['email']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
 
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid Email format";
    }
  
  /* first check the database to make sure 
   an entered email is in the Database*/
  
    $result ="SELECT count(*) FROM system_user WHERE email=?";
$stmt = $conn->prepare($result);
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
  if ($count==0) { // if user exists
   echo "No account with the Email provided";
    }

  // create and send a verification code to the email
  else{
    
$otp= mt_rand(100000, 999999);

    $query = "UPDATE system_user SET code=? WHERE email=? ";
  $stmti = $conn->prepare($query);
$stmti->bind_param('is',$otp,$email);
$stmti->execute();
$stmti->close();

    $_SESSION['email'] = $email;
    $_SESSION['code'] = $otp;
    //$_SESSION['stat'] = $status;
    $to=$email;
    $from="From: byiringirobertin37@gmail.com";
    $subject="Verification Code for my Website";
    $message =$otp;
  
    $mailing = mail($to,$subject,$message,$from);

    header('location: verify_email.php');
    
  }
}


?>