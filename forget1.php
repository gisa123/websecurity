<?php 
if (isset($_POST['sub'])) {
  $email=$_POST['email'];
  $a=0;
  include("database.php");
  $sql="select* from system_user where email=?";
$pas= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($pas,$sql)) {
 echo "failed!";
}
else{
  mysqli_stmt_bind_param($pas,"s",$email);
  mysqli_stmt_execute($pas);
  $select=mysqli_stmt_get_result($pas);
  while($row=mysqli_fetch_assoc($select)) {
    if($row['email']==$email)
    {
    $a=$a+1;
    $tokenemail=$row['email'];
}
  }
}
  if($a>=1){
  $new=bin2hex(random_bytes(8));
  $token=random_bytes(32);
  $url="http://localhost/websec/recover.php?new=$new";
  //stmt==pas, selector==new;
  
     $sql="delete from reset_password where email=?";
     $pas= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($pas,$sql)) {
 echo " failed";
}
else{
  mysqli_stmt_bind_param($pas,"s",$email);
  mysqli_stmt_execute($pas);
}
$q="insert into reset_password(email,token) values(?,?)";
$pas= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($pas,$q)) {
 echo " failed";
}
else{
  //$hashedtoken=password_hash($token,PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($pas,"ss",$email,$new);
  mysqli_stmt_execute($pas);
}

$from = 'byiringirobertin37@gmail.com';
$to = $email;
$subject = 'reset password';
$message = '<p>follow the following link';
$message .= '<a href="'.$url.'</a></p>';
$headers = 'From: ' . $from;
$headers .= 'Reply-To: ' . $from;
$headers .= 'Content-type:text/html';

mail($to, $subject, $message, $headers);
echo "email sent successful!!";
}
else{
  echo "email not found";

}
}
?>