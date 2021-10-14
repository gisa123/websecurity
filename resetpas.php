<?php 
if (isset($_POST['but'])) {
	$new=$_POST['new'];
  $a=0;
	//$validator=$_POST['validator'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];
	if ($password!=$password1) {
    echo '<script language="javascript">';
echo 'alert("password is not matching....");';
echo "\n";
  //  echo ' window.location.href="https://www.sustainablewestonma.org/update.php"';
//echo 'window.location.href="createnewpass.php?selector="'.$selector;
header("location:recover.php?new=$new");
echo '</script>';

exit();
	}
	//$currentdate=date("U");
	require "database.php";
$sql="select* from reset_password where token=?";
$st= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($st,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($st,"s",$new);
  mysqli_stmt_execute($st);
  $select=mysqli_stmt_get_result($st);
  while($row=mysqli_fetch_assoc($select)) {
    if($row['token']==$new)
    {
    $a=$a+1;
    $tokenemail=$row['email'];
}
  }
  if ($a<1) {
 echo "you need to re-submit your request".$new;
  }
  else
  {
$sql="select* from reset_password where email=?";
$st= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($st,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($st,"s",$tokenemail);
  mysqli_stmt_execute($st);
  $select=mysqli_stmt_get_result($st);
  if (!$row=mysqli_fetch_assoc($select)) {
  	echo "There is an error!";
  }
  else
  {
  $sql="UPDATE system_user set password=? where email=?";
  $st= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($st,$sql)) {
 echo "statement failed";
}
else{
	$newpassword1=sha1($password1);
  mysqli_stmt_bind_param($st,"ss",$newpassword1,$tokenemail);
  mysqli_stmt_execute($st);

  $sql="delete from reset_password where email=?";
     $st= mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($st,$sql)) {
 echo "statement failed";
}
else{
  mysqli_stmt_bind_param($st,"s",$tokenemail);
  mysqli_stmt_execute($st);
  header("location:index.php?newpwd=passwordupdated");
}	
  }

  	}
}
}}}
else
{
	header("location:index.php");
}
?>