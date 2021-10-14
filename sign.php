<?php
session_start();
include "database.php";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$password = sha1($_POST['password']);
$_SESSION['email']=$email;
    $_SESSION['code']=$code;
$code= mt_rand(100000, 999999);
$status="not verified";
$sql="INSERT INTO system_user (firstname, lastname, email, username, password, code, status) values(?,?,?,?,?,?,?)";
$st=mysqli_stmt_init($conn);
 $to=$email;
    $from="From: byiringirobertin37@gmail.com";
    $subject="Verification Code for the site";
    $message =$code;
  
    $mailing = mail($to,$subject,$message,$from);
if(mysqli_stmt_prepare($st,$sql)){
	
	//echo '<script>alert(" successfully signup")</script>';
	//echo "<script>location.href='index.php'</script>";
	header('location: verify_email.php');
	mysqli_stmt_bind_param($st,"sssssss",$fname,$lname,$email,$uname,$password,$code,$status);
    mysqli_stmt_execute($st);
}
else{
	
	echo '<script language="javascript">';
echo 'alert(" failed to signup")';
echo '</script>';
echo "error:".$sql."<br>".$conn->error;
echo "<script>location.href='signup.php'</script>";

}
?>